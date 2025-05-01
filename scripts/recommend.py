import sys
import json
import numpy as np
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity

# Helper: Normalize text
def normalize(text):
    return text.lower().strip()

def log(msg):
    print(msg, file=sys.stderr)  # Log to stderr (capturable by Laravel)

log("Python script recommend.py is running!")

try:
    input_data = json.loads(sys.stdin.read())
except Exception as e:
    log(f"Failed to read input: {str(e)}")
    print(json.dumps([]))
    sys.exit(1)

applied_jobs = input_data.get('applied_jobs', [])
all_jobs = input_data.get('all_jobs', [])

log(f"Received {len(applied_jobs)} applied jobs and {len(all_jobs)} total jobs")

# Exit if no applied jobs
if not applied_jobs:
    log("No applied jobs found.")
    print(json.dumps([]))
    sys.exit(0)

# Normalize and extract descriptions
applied_texts = [normalize(job.get('description', '')) for job in applied_jobs if job.get('description')]
all_texts = [normalize(job.get('description', '')) for job in all_jobs if job.get('description')]

# Double-check for empty descriptions
if not all(applied_texts) or not all(all_texts):
    log("One or more job descriptions are empty after normalization.")
    print(json.dumps([]))
    sys.exit(0)

# TF-IDF Vectorization
try:
    vectorizer = TfidfVectorizer(stop_words='english')
    all_vectors = vectorizer.fit_transform(all_texts)
    applied_vectors = vectorizer.transform(applied_texts)
except Exception as e:
    log(f"TF-IDF Vectorization failed: {str(e)}")
    print(json.dumps([]))
    sys.exit(1)

# Compute mean user profile
user_profile = np.mean(applied_vectors.toarray(), axis=0).reshape(1, -1)

# Compute cosine similarity
similarities = cosine_similarity(user_profile, all_vectors)[0]
log(f"Similarity scores: {similarities[:10]}")

# Get list of applied job IDs
applied_job_ids = [job["id"] for job in applied_jobs]

# Score and filter jobs
scored_jobs = [
    {
        "id": job["id"],
        "title": job.get("title", ""),
        "description": job.get("description", ""),
        "posted_on": job.get("posted_on", ""),
        "ending_on": job.get("ending_on", ""),
        "requirements": job.get("requirements", ""),
        "score": float(sim)
    }
    for job, sim in zip(all_jobs, similarities)
    if job["id"] not in applied_job_ids
]

# Sort and pick top 5 recommendations
top_jobs = sorted(scored_jobs, key=lambda x: x["score"], reverse=True)[:5]

log(f"Returning {len(top_jobs)} recommended jobs")
print(json.dumps(top_jobs))
