#!/usr/bin/python
import os
import time
import subprocess

status = subprocess.check_output(['sudo', 'git', 'status'], shell=True).decode('utf-8')
update = "./update.py"

print(str(status))