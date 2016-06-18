wifi.setmode(wifi.STATION)
wifi.sta.config("SSID","password")
print(wifi.sta.getip())
led1 = 3
gpio.mode(led1, gpio.OUTPUT)
key  = "1234567890abcdef"
srv=net.createServer(net.TCP)
srv:listen(80, function(conn)
    conn:on("receive", function(conn, payload) 
        print(payload)
        textodec = crypto.decrypt("AES-ECB", key, payload)
        print(textodec)
        
        encontraa = string.find(textodec, "ABRIR")
        print(encontraa)
        if encontraa ~=nil then
             gpio.write(led1, gpio.LOW)
             print("Encontrei")
        else 
           
           encontraf = string.find(textodec, "FECHAR")
           print(encontraf)
           if encontraf ~=nil  then
               gpio.write(led1, gpio.HIGH)
               print("Encontrei")
           end
        end
        
    end)

    conn:on("sent", function(conn) 
    conn:close() 
    end)
end)
