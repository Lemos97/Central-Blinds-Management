#!/usr/bin/env  python

from Crypto.Cipher import AES
import socket
import RPi.GPIO as GPIO, time, os

DEBUG = 1
GPIO.setmode(GPIO.BCM)

conta = 1
 
ip = '192.168.*.*'
porto = 80
key = '1234567890abcdef'

def RCtime (RCpin):
	reading = 0
	GPIO.setup(RCpin, GPIO.OUT)
	GPIO.output(RCpin, GPIO.LOW)
	time.sleep(0.1)
	GPIO.setup(RCpin, GPIO.IN)
	while (GPIO.input(RCpin) == GPIO.LOW):
		reading += 1
	return reading
try:
	while conta == 1:
		print(RCtime(3))
		if RCtime(3)>65:
			s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
			s.connect((ip, porto))
			msg = '{{{{{FECHAR{{{{{'
			cipher_aes = AES.new(key.encode(),AES.MODE_ECB)
			encrypted_aes = cipher_aes.encrypt(msg.encode())
			s.send(encrypted_aes)
			s.close()
			print (encrypted_aes)
			conta+=1
		elif RCtime(3)<64:
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
	print ('Outro erro ou excecao ocurrida')
finally:
	GPIO.cleanup()
	raise SystemExit()

