Installation
===
#STEP1:
install docker environment

#STEP2:
open the source file path with (cmd/terminal)

#STEP3: copy these commands to the cmd (modify the your_path)<br/>

1. Build a docker image with the source file.
```
docker build -t simnotecard .
```
2. Run a docker image <br/>
*xxxx need to change your local path*
```
docker run -it --name=SNC -v D:\docker\simNoteCard\app:/var/www/html -p=3000:3000 --restart always simnotecard 
```

#STEP4:
localhost:3000/main.html
<br/>

Screenshot
===

1. Click on the screen
<img src="https://github.com/kizion/Simple-Note-Card/assets/153003165/001a2fc4-074e-407e-a467-5bf1514e3d4a" width="150" height="350" />
<img src="https://github.com/kizion/Simple-Note-Card/assets/153003165/e947662d-7876-4c86-bb15-a714f0a32353" width="150" height="350" />

2. Words Management
<img src="https://github.com/kizion/Simple-Note-Card/assets/153003165/5d697082-c492-4c66-8cf1-f8562b7b3114" width="150" height="350" />
<img src="https://github.com/kizion/Simple-Note-Card/assets/153003165/c72ba131-8ce5-4642-9b73-6b8c88dc1a42" width="150" height="350" />

