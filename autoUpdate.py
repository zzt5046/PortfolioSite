#!/usr/bin/python
import os
import time
import subprocess

status = subprocess.Popen(['git', 'status'], stdout=subprocess.PIPE, stderr=subprocess.STDOUT)
stdout,stderr = status.communicate()

update = "./update.py"

print(str(stdout.split()[0]))