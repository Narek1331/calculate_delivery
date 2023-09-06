function append(id, body, param = 'beforeend'){
    let el = document.getElementById(id);
    el.insertAdjacentHTML(param, body);
}

async function getPoints(){

    await fetch('/api/point', {
        method: 'GET'
      }).then(res => res.json())
        .then(res => {
            if(res.status){
                for(let i=0;i<res.datas.length;i++){
                    append('point_list_from',`<option value='${res.datas[i].id}'>${res.datas[i].name}</option>`)
                    append('point_list_to',`<option value='${res.datas[i].id}'>${res.datas[i].name}</option>`)
                }
            }

        });
}

async function calc_delivery(){
    const point_from = document.getElementById('point_list_from').value;
    const point_to = document.getElementById('point_list_to').value;
    const delivery = document.getElementById('delivery').value;
    const weight_kg = document.getElementById('weight_kg').value;

    const calc_price = document.getElementById('calc_price');
    const calc_date = document.getElementById('calc_date');

    await fetch('/api/point/calculate', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({point_from,point_to,delivery,weight_kg}),
      }).then(res => res.json())
        .then(res => {
            if(res.status){
                calc_price.innerHTML = res.price;
                calc_date.innerHTML = res.date;
            }

        });
}

getPoints()

