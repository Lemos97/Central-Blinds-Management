#!/usr/bin/env  python
from Crypto.Cipher import AES
import socket
import os
import glob
import time
import subprocess
os.system('modprobe w1-gpio')
os.system('modprobe w1-therm')
base_dir = '/sys/bus/w1/devices/'
device_folder = glob.glob(base_dir + '28-0000053c4f0f')[0]
device_file = device_folder + '/w1_slave'

conta = 1


ip = '192.168.*.*'
porto = 80
key = '1234567890abcdef'

def read_temp_raw():
        f = open(device_file, 'r')
        lines = f.readlines()
        f.close()
        return lines


def read_temp():
        lines = read_temp_raw()
        while lines[0].strip()[-3:] != 'YES':
                time.sleep(0.2)
                lines = read_temp_raw()
        equals_pos = lines[1].find('t=')
        if equals_pos != -1:
                temp_string = lines[1][equals_pos+2:]
                temp_c = float(temp_string) / 1000.0
                return temp_c
try:
    while conta==1:
        print(read_temp())
        time.sleep(0.5)
        if (read_temp < 20):
            s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
            s.connect((ip, porto))
            msg = '{{{{{FECHAR{{{{{'
            cipher_aes = AES.new(key.encode(),AES.MODE_ECB)
            encrypted_aes = cipher_aes.encrypt(msg.encode())
            s.send(encrypted_aes)
            s.close()
            print (encrypted_aes)
            conta+=1
        elif (read_temp > 21):
            s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
            s.connect((ip, porto))
            msg = '{{{{{{ABRIR{{{{{'
            cipher_aes = AES.new(key.encode(),AES.MODE_ECB)
            encrypted_aes = cipher_aes.encrypt(msg.encode())
            s.send(encrypted_aes)
            s.close()
            print (encrypted_aes)
            conta+=1
except KeyboardInterrupt:
        print ('Programa interrompido pelo teclado')
except:
        print ('Outro erro ou excecçao ocurrida')
finally:
    raise SystemExit()

