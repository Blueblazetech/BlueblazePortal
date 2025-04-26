import sys
import json
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import numpy as np
print(Hello);
# Read JSON input (from Laravel)
input_data = json.loads(sys.stdin.read())

applied_jobs = input_data['applied_jobs']
all_jobs = input_data['all_jobs']

# Exit if no applied jobs
if not applied_jobs:
    print(json.dumps([]))
    sys.exit(0)

# Text lists
applied_texts = [job['description'] for job in applied_jobs]
all_texts = [job['description'] for job in all_jobs]

# TF-IDF Vectorization
vectorizer = TfidfVectorizer(stop_words='english')
all_vectors = vectorizer.fit_transform(all_texts)
applied_vectors = vectorizer.transform(applied_texts)

# Mean profile
user_profile = np.mean(applied_vectors.toarray(), axis=0).reshape(1, -1)

# Similarities
similarities = cosine_similarity(user_profile, all_vectors)[0]

# Attach scores
scored_jobs = [
    {"id": job["id"], "title": job["title"], "score": float(sim)}
    for job, sim in zip(all_jobs, similarities)
    if job["id"] not in [j["id"] for j in applied_jobs]  # Exclude already applied
]

# Sort and pick top 5
top_jobs = sorted(scored_jobs, key=lambda x: x["score"], reverse=True)[:5]

print(json.dumps(top_jobs))
