STEP1:
install docker environment

STEP2:
open to the source code file path with (cmd/terminal)

STEP3: copy these commands to the cmd
docker build -t simnotecard .
docker run -it --name=SNC -v "your_path"\app:/var/www/html -p=3000:3000 simnotecard 

STEP4:
localhost:3000/main.html
