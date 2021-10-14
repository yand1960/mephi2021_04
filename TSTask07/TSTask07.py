import os
import subprocess
from tabulate import tabulate
import pandas as pd

# Extension must have lower case
ARTEFACT_SUFFIX = "Task04.jpg"
artefact_is_folder = (ARTEFACT_SUFFIX.find(".") < 0)

# Address of local repo with connect to remote repo
REPO_ADDRESS = r"C:\Users\newbi\Desktop\Новая папка\mephi4"

tickers = "AB AI AK AS AV EU IK IM MI MM SK TS YA".split(' ')

GIT_CMD_FILES = "git pull --all"
GIT_CMD_BRANCH = "git checkout {0}"
GIT_CMD_DATE = "git log -n 1 --pretty=format:%cd " \
               "--date=format:\"%d %b %Y %H:%M:%S\" {0}{1}"

# Get all changes from remote repo
subprocess.check_output(GIT_CMD_FILES, shell=True, cwd=REPO_ADDRESS)


def get_date(branch: str, search_obj: str = ARTEFACT_SUFFIX) -> str:
    try:
        subprocess.check_output(
            GIT_CMD_BRANCH.format(branch),
            shell=True,
            cwd=REPO_ADDRESS
        )
        out = str(subprocess.check_output(
            GIT_CMD_DATE.format(branch, search_obj),
            shell=True,
            cwd=REPO_ADDRESS
        ))
        # Delete trash symbols in begin and end of output string
        out = out[2:len(out) - 1]
    except subprocess.CalledProcessError:
        out = "Task wasn't complete"

    return out


buffer_data = []

for ticker in tickers:
    # Get output console message
    date = get_date(ticker)
    # Bad case (git log case sensitive)
    if date == "":
        if not artefact_is_folder:
            inverse_case_ext = \
                ARTEFACT_SUFFIX[:ARTEFACT_SUFFIX.find(".")] + \
                ARTEFACT_SUFFIX[ARTEFACT_SUFFIX.find("."):].upper()
            date = get_date(ticker, search_obj=inverse_case_ext)
            ARTEFACT_SUFFIX.find(".")
        else:
            date = "Bad case in file/folder"

    buffer_data.append([ticker, date])

# Info about repo to output
df = pd.DataFrame(buffer_data, columns=['Name', 'Date of last commit'])

os.system("cls")
print(tabulate(df, headers = 'keys', tablefmt = 'psql', stralign="center"))
