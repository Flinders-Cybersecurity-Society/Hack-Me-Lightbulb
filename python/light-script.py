from lifxlan import *
import sys

light_mac = '00:00:00:00:00:00' #will never change, hard coded
light_ip = '10.0.1.3' #might change, needs to be set to const on router
max_brightness = 65535 # 0 - 65535

lifxlan = LifxLAN()

light = Light(light_mac, light_ip)

def on():
    light.set_power(0)
    light.set_brightness(65535)

def off():
    light.set_power(0)
    light.set_brightness(65535)


off()
