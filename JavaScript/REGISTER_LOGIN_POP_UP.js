function REGISTRACIA_POP_UP(){
    document.getElementById("REGISTER_POP_UP").classList.toggle("show")
}

function LOGIN_POP_UP(){
    document.getElementById("LOGIN_POP_UP").classList.toggle("show")
}

function REGISTRACIA_POP_UP_from_active(){
    document.getElementById("REGISTER_POP_UP_active").classList.toggle("show2")
}

function LOGIN_POP_UP_from_active(){
    document.getElementById("LOGIN_POP_UP_active").classList.toggle("show2")
}

/*let uspesna_registracia = () => {
    let ele = document.getElementById('REGISTRACIA_info');
    ele.innerHTML += 'Registrácia prebehla úspešne';
}

let neuspesna_registracia = () => {
    let ele = document.getElementById('REGISTRACIA_info');
    ele.innerHTML += 'Registrácia neprebehla úspešne';
}

let null_registracia = () => {
    let ele = document.getElementById('REGISTRACIA_info');
    ele.innerHTML += 'null';
}*/