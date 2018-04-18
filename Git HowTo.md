# GiTHub & Atom BASICS

1. Create on local repo first:

  Atom -> Git Plus -> Git init

  mindenek előtt remote címet kell megadni:
   (persze ezelőtt még online (v vhogyan) létre kell hozni a repot!)

    $git remote add origin <remote repo>
      pl.: $git remote add origin git@github.com:Aerokinetic6/aerokinetic6.github.io.git

   a remote repo címet online felületen a "clone or download" repos zöld gomb
    alatt talál6juk. Atomos packagekhez SSH-s címet használjunk, mert csak
    azzal műxik vmiért



  Add (all) -> Commit (all) -> Push (all)

  ha push nem műxik fatal error no upstream branch error jön elő:
  
    Run: $git push --set-upstream origin master
  ezután elvileg működni fog..


2. Remote to Local:

  Vagy downloadoljuk online felületről a pakkot, v:

    $cd /a_hely/ahol_dolgozunk
    $git clone <remote repo>

  ezt atomon belül git initeljük Git Plussal

  ha vmit az onlien felületről akarunk befrissíttetni a localra, akk:

    $git pull origin <branch>  pl.: $git pull origin master

  remote repot itt se felejtsük el beállítani az remote add-os paranccsal!



Egyéb hasznosságok:

  Ha nem ssh-t hanem https-t használunk és nem akarunk mindig usernamet és passwdöt gépelgetni:
    
    $git config --global credential.helper cache

  Ha inkonzisztens historyk miatt nem akarja a pull-t végrehajtani akk ezzel kierőltethetjük:
    
    $git pull origin master --allow-unrelated-histories

  Config file megtekintése:
    
    $git config --list

  Remote repok ill. branchek kilistázása:
    
    $git remote -v
    $git branch -vv

  usrename és email letárolása ill megtekintése:
    
    $git config --global user.name "UserName"
    $git config --global user.email "user@vmimail.com"

    $git config --global user.name
    $git config --global user.email

  Remote repo törlése:
    $git remote rm origin
    $git remote rm destination
