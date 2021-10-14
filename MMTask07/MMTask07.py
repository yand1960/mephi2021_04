# моё решение добавляет текстовый файл с временем
# последнего коммита в папку с заданием одногруппника (при
# копировании задания в виде папки) или в общую папку задания кладёт именованный файл (при
# копировании задания в виде отдельного файла)

# вывод времени идёт только по последнему коммиту;
# ограничение связано с принципом работы команды git show

import os

ARTEFACT_SUFFIX = "Task05"
OUTPUT_FOLDER = "..\\" + ARTEFACT_SUFFIX.split(".")[0]

tickers = "AB AI AK AS AV EU IK IM MI MM SK TS YA"
tickers = tickers.split(' ')

if not os.path.isdir(OUTPUT_FOLDER):
   os.mkdir(OUTPUT_FOLDER)

artefact_is_folder = (ARTEFACT_SUFFIX.find(".") < 0)

for ticker in tickers:
   cmd = f"git checkout {ticker}"
   os.system(cmd)
   os.system("git pull")
   if artefact_is_folder:
      cmd = f"xcopy {ticker}{ARTEFACT_SUFFIX}\\ {OUTPUT_FOLDER}\\{ticker}{ARTEFACT_SUFFIX}\\ /Y /S"
      # вывожу время последнего коммита в текстовый файл и кладу его в папку с заданием одногруппника
      os.system("git show -s --format=%ci >> " + ticker + ARTEFACT_SUFFIX + "//commitTime.txt")
      print(cmd)
      os.system(cmd)
   else:
      cmd = f"copy {ticker}{ARTEFACT_SUFFIX} {OUTPUT_FOLDER}"
      print(cmd)
      os.system(cmd)
      # если задача в виде файла, то в папку, куда падают задачи, также добавляю текстовые выводы,
      # но в этом случае именованные (чтобы не перепутать, чьи они)
      os.system("git show -s --format=%ci >> " + ticker + "commitTime.txt")
      cmd = "copy " + ticker + "commitTime.txt" + " " + OUTPUT_FOLDER
      print(cmd)
      os.system(cmd)
