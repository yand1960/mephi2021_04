from datetime import datetime

import git
import os

ARTEFACT_SUFFIX = "Task05.jpg"

OUTPUT_FOLDER = ARTEFACT_SUFFIX.split(".")[0]

tickers = "AB AI AK AS AV EU IK IM MI MM SK TS"
tickers = tickers.split(' ')


def main():
    
    if not os.path.isdir(OUTPUT_FOLDER):
        os.mkdir(OUTPUT_FOLDER)
  
    repository_name = '/mephi4'

    repository_path = OUTPUT_FOLDER + repository_name

    repository_clone_path = "https://github.com/yand1960/mephi4.git"

    if not os.path.exists(repository_path):
        git.Git(OUTPUT_FOLDER).clone(repository_clone_path)

    repo = git.Repo(repository_path)

    for t in tickers:
        
        repo.git.checkout(t)
       
        tree = repo.tree()
       
        for blob in tree:

            commit = repo.iter_commits(paths=blob.path, max_count=1).__next__()
            
            date = datetime.fromtimestamp(commit.committed_date)
            
            with open(OUTPUT_FOLDER + "/" + t, "a") as file:
                file.write(f"{blob.path} {date}\n")


if __name__ == '__main__':
    main()
