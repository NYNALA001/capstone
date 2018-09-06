function change_view(section){
    var panel = section + '-panel';
    var sections = document.getElementsByClassName('dashboard-content');
    console.log(panel);
    for(var i = 0; i < sections.length; i++){
        if(!sections[i].classList.contains('hide')){
            sections[i].classList.add("hide");}
        if (document.getElementById(panel).classList.contains('hide')){
        document.getElementById(panel).classList.remove('hide');}
    }
}