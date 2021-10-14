import os

cmd = "git log -1 --date-order --date=format:'%Y-%m-%d %H:%M:%S'"
date = []
result = None
final = []


logs = (os.popen(cmd).read()).split("\n")

for i in logs:
    if "Date" in i:
        date = i.split(" ")

final.append(date[-2])
final.append(date[-1])