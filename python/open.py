#!/usr/bin/env  python
from Crypto.Cipher import AES
import socket

def encriptacao():
	msg = '{{{{{{ABRIR{{{{{'
	key = '1234567890abcdef'
	cipher_aes = AES.new(key.encode(),AES.MODE_ECB)
	encrypted_aes = cipher_aes.encrypt(msg.encode())
	return encrypted_aes

def sock():
	ip = '192.168.*.*'
	porta = 80
	s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
	s.connect((ip, porta))
	s.send(encriptacao)
	s.close()

while True:
	sock()


