var vehicle_icon = document.getElementsByClassName('vehicle-icon');
var vehicle_type = document.getElementsByClassName('vehicle-type');

for (let index = 0; index < vehicle_type.length; index++) {
    const element = vehicle_type[index].textContent;
    if(element.toLowerCase() == 'car') {
        vehicle_icon[index].classList.remove('fa-motorcycle');
        vehicle_icon[index].classList.add('fa-car');
    } else {
        vehicle_icon[index].classList.remove('fa-car');
        vehicle_icon[index].classList.add('fa-motorcycle');
    }
}
