import os
import subprocess

ARTEFACT_SUFFIX = "Task07"
OUTPUT_FOLDER = "..\\" + ARTEFACT_SUFFIX.split(".")[0]

tickers = "AB AI AK AS AV EU IK IM MI MM SK TS master"
tickers = tickers.split(' ')

if not os.path.isdir(OUTPUT_FOLDER):
   os.mkdir(OUTPUT_FOLDER)

artefact_is_folder = (ARTEFACT_SUFFIX.find(".")<0)

for ticker in tickers:
   cmd = f"git checkout {ticker}"
   os.system(cmd)
   cmd_date = 'git log -n 1 --pretty=format:%cd --date=format:"%d.%m.%Y %H-%M-%S"'
   date = subprocess.getoutput(cmd_date)
   date = " " + date
   print(date)
   os.system("git pull")
   if artefact_is_folder:
      cmd = f"xcopy {ticker}{ARTEFACT_SUFFIX}\\ {OUTPUT_FOLDER}\\{ticker}{ARTEFACT_SUFFIX}\\ /Y /S"
   else:
      cmd = f"copy {ticker}{ARTEFACT_SUFFIX} {OUTPUT_FOLDER}"
   print(cmd)
   os.system(cmd)
   if artefact_is_folder:
      os.system(f'rename "{OUTPUT_FOLDER}\\{ticker}{ARTEFACT_SUFFIX}" "{ticker}{ARTEFACT_SUFFIX}{date}"')
   else: 
      firstname = f"{OUTPUT_FOLDER}\\{ticker}{ARTEFACT_SUFFIX}"
      secondname = f'{ticker}{ARTEFACT_SUFFIX.split(".")[0]}{date}'
      file_format = f'{ARTEFACT_SUFFIX.split(".")[1]}'
      os.system(f'rename "{firstname}" "{secondname}.{file_format}"') 

