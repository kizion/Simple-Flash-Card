STEP1:
install docker environment

STEP2:
go to the source code file path (cmd/terminal)

STEP3: copy these command to the cmd
docker build -t simnotecard .
docker run -it --name=SNC -v D:\docker\simNoteCard\app:/var/www/html -p=3000:3000 simnotecard 

STEP4:
localhost:3000/main.html
