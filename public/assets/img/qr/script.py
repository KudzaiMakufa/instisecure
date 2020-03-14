#!/usr/bin/env python
import sys
import qrcode

# def SaveImg(name):
# 	return name
# 	print(name)
qr = qrcode.QRCode(
    version=1,
    error_correction=qrcode.constants.ERROR_CORRECT_L,
    box_size=10,
    border=4,
)
data = sys.argv[1].replace("-"," \n")
qr.add_data(data)
qr.make(fit=True)

img = qr.make_image(fill_color="black", back_color="white")
img.save(sys.argv[2]+''+sys.argv[1]+'.png')
print(sys.argv[1])


# SaveImg('kudzai')
