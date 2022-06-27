---
search:
  keywords:
    - deploy
    - bot
    - telegram
    - do
    - digitalocean
    - '5'
    - hosting
    - jar
    - artifact
---

# Lesson 5. Deploy your bot

I think, when you are reading this, you have created your own bot with the help from my book. So now, its time to run it not on your home computer ~~with Intel Pentium II~~, but on professional server hardware. I will show how to deploy your bot on [DigitalOcean hosting](https://m.do.co/c/1a3a7fad419f).

## Creating droplet

Firstly, you need to create account on DigitalOcean. Open [this link](https://m.do.co/c/1a3a7fad419f) to get 10$ as gift from me, enter your email and password and click "Create an account"

![Register](https://github.com/MonsterDeveloper/java-telegram-bot-tutorial/raw/master/media/do_register.png)

Then, follow register insctructions. Once you are in your control panel, create a new droplet.

Select OS. I recommend using Ubuntu 16.04.01 x64. Then choose preffered plan. For Java bot, you can select 512-1GB RAM \(its enough for start\). Select datacenter's region \(I recommend to choose nearest city\), scroll down and click "Create". Check your email inbox for letter like this:

![Droplet settings email](https://github.com/MonsterDeveloper/java-telegram-bot-tutorial/raw/master/media/do_email.png)

## Connecting via SSH

You will need next software for that:

* [PuTTY SSH Client](http://www.chiark.greenend.org.uk/~sgtatham/putty/latest.html)
* [FileZilla FTP Client](https://filezilla-project.org/)

When you install it, open PuTTY and write server IP and port \(default 22\).

![PuTTY login](https://github.com/MonsterDeveloper/java-telegram-bot-tutorial/raw/master/media/do_pytty.png)

And click "Open". You will see something like:

![PuTTY Security Alert](https://github.com/MonsterDeveloper/java-telegram-bot-tutorial/raw/master/media/do_fingerprint.png)

Click "Yes". Then login as "root" user and with password that you have recieved via email. Now we need to install Java on your server. Type following:

```bash
sudo apt-get update
sudo apt-get upgrade
sudo apt-get install default-jre
sudo apt-get install default-jdk
sudo add-apt-repository ppa:webupd8team/java
sudo apt-get update
sudo apt-get install oracle-java8-installer
```

Type `java -version` to check installation. You will see something like that:

![Java Version](https://github.com/MonsterDeveloper/java-telegram-bot-tutorial/raw/master/media/java_version.png)

## Creating and uploading JAR

Now, open `IntelliJ Idea` and go to File&gt;Project Structure&gt;Artifacts&gt; + \(Add artifact\)&gt;JAR&gt;From modules with dependencies&gt;Select main class \(`Main.java`\)&gt;OK&gt;Apply. Then Build&gt;Build Artifacts&gt;Build. Then in the `out/artifacts/` folder you will see your JAR.

### Uploading to the server

Open FileZilla and enter IP address, username, password and port \(default 22\) and click "Connect". Create new folder on your server \(right window\), open it and upload you JAR by dragging it from left window \(local computer\) to right window \(server\). Open PuTTY and type:

```bash
screen
```

Press `ENTER` and then go to your folder:

```bash
cd FOLDER_NAME
```

And just run your JAR:

```bash
java -jar FILE.jar
```

Well done! You are now hosting your bot at DigitalOcean. To exit terminal, press `CTRL + A + D` and then type `exit`. To return, connect via SSH, type `screen -r` and you will be returned to your screen session. To stop the bot: `CTRL + C`.

Well, that's all for now. See you soon!

