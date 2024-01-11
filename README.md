Installation
===
#STEP1:
install docker environment

#STEP2:
open to the source code file path with (cmd/terminal)

#STEP3: copy these commands to the cmd (modify the your_path)<br/>
1. docker build -t simnotecard .
2. docker run -it --name=SNC -v <strong>your_path</strong>\english_app:/var/www/html -p=3000:3000 simnotecard 

#STEP4:
localhost:3000/main.html
<br/>

Screenshot
===
