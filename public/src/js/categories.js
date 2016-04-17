/**
 * Created by FBI on 17/04/2016.
 */

//On verifie toutes les 100millisecondes que le document est pret
var docReady= setInterval(function(){
    if(document.readyState !== "complete"){
        return;
    }
    //Un fois pret, on annule le compteur
    clearInterval(docReady);

var editSection = document.getElementsByClassName('edit');
    for(var i=0;i<editSection.length;i++){
        editSection[i].firstElementChild.firstElementChild.children[1].firstChild.addEventListener('click',startEdit)
    }

    //On écoute le bouton pour envoyer les data en ajax
    document.getElementsByClassName('btn')[0].addEventListener('click',createNewCategory);
},100);


function createNewCategory(e){
    //On annule l'evenement par defaut
    e.preventDefault();
    // On prend l'input à coté du btn "submit"
    var nom = e.target.previousElementSibling.value;

    //Si le input est vide on ALERTE
    if(nom.length ===0){
        alert('veuillez indiquer un nom !')
        return;
    }

//Sinon on lance la fn AJAX
    ajax("POST","/admin/blog/categorie/creation","nom="+nom,nouvelleCategorie,[nom]);

}

function nouvelleCategorie(params,success,responseObj){
    location.reload();
}
function startEdit(e) {
    //On annule l'evenement par defaut
    e.preventDefault();

    e.target.innerText="Valider";
    console.log(e);
    var li = e.path[2].children[0];
li.children[0].value=e.path[4].previousElementSibling.children[0].innerText;
li.style.display="inline-block";
    setTimeout(function(){
        li.children[0].style.maxWidth="110px";
    },500)
e.target.removeEventListener('click',startEdit);
    e.target.addEventListener('click',saveEdit)
}

function saveEdit(e){
    e.preventDefault();
    var li = e.path[2].children[0]
var nomCategorie = li.children[0].value;
    var categorieID=e.path[4].previousElementSibling.dataset['id'];
    if(nomCategorie.length === 0){
        alert('veuillez indiquer un nom !')
        return;
    }
    ajax('POST',"/admin/blog/categories/update",'nom=' +nomCategorie+"categorieID="+categorieID,endEdit,[e])
}
function endEdit(parametres,success,responseObj){
var event = parametres[0];
    if(success){
        var nouveauNom = responseObj.nouveau_nom;
var article = e.path[5];
        article.style.background="#afefac"
        setTimeout(function(){
            article.style.background="white";
        },300);
        article.firstElementChild.firstElementChild.innerHTML= nouveauNom;
    }
    e.target.innerText = "Editer";
    var li = event.path[2].children[0];
    li.children[0].style.maxWidth="0px";
    setTimeout(function(){
        li.style.display="none";
    },310);
    e.target.removeEventListener('click',saveEdit);
    e.target.addEventListener('click',startEdit);
}

function ajax(methode,url,parametres,callback,callbackParams){
    var http;

    if(window.XMLHttpRequest){
        http= new XMLHttpRequest();
    }
    else{
        http=  new ActiveXObject("Microsoft.XMLHTTP")
    }
    http.onreadystatechange=function(){
            if(http.readyState == XMLHttpRequest.DONE){
                if(http.status ==200){
                    var obj= JSON.parse(http.responseText);
                    callback(callbackParams,true,obj);

                } else if(http.status === 400){
                  alert('La categorie n\'a pas pu etre enregistrée')
                  callback( callbackParams,false)
                }
                else{
                var obj = JSON.parse(http.responseText);
                    if(obj.message){
                        alert(obj.message);
                    }
                    else{
                        alert('Verifiez le nom !')
                    }
                }
            }
    };

    http.open(methode,baseURL + url,true);
    http.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    http.setRequestHeader('X-Requested-With','XMLHttpRequest');
    http.send(parametres +'&_token=' + token);

}