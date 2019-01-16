#!/usr/bin/python
import os
import time
pull = 'sudo git pull'
reset = 'sudo systemctl restart apache2'
os.system(pull)
time.sleep(1)
os.system(reset)