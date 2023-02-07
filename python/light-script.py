from lifxlan import *
import sys
import time

light_mac = 'D0:73:D5:34:F3:0F' #will never change, hard coded
light_ip = '10.0.1.3' #local ip address of lifx globe, DHCP set on modem to ensure that this stays constant
max_brightness = 65535 # 0 - 65535

lifxlan = LifxLAN()

light = Light(light_mac, light_ip)

def on():
    print("[i] Turning on")
    light.set_power(1)
    light.set_brightness(32000)

def off():
    print("[i] Turning off")
    light.set_power(0)

i = 0
while i < 100:
    off()
    time.sleep(0.5)
    on()
    time.sleep(0.5)
    i = i+1


