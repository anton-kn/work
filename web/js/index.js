/**
 * При отправке заявки из общей формы после выбора пользователя получателя
 * подгружать с помощью ajax и отображать сведения о нём.
 */
let employee = document.querySelector("#request-to_emoloyee_id");
if (employee) {
    employee.addEventListener("change", function () {
        //let employee = document.querySelector("#request-to_emoloyee_id");
        if (employee && employee.selectedIndex != 0) {
            getEmployee(employee.selectedIndex);
        }
        if (employee.selectedIndex == 0) {
            //let employeeInfo = document.querySelector("#employee-info-js");
            hidden(employeeInfo);
        }

    });
}

async function getEmployee(id) {
    const response = await fetch(`http://localhost/work/web/employee/info/?id=${id}/`);
    let employee = await response.json();
    empl = employee.employee
    console.log(empl);
    createDom(empl.fio, empl.nameRole, empl.email);
}


function show(elem) {
    elem.style.display = "block"
}
function hidden(elem) {
    elem.style.display = "none"
}

function createDom(fio, nameRole, email) {
    $alert = `
    <div class="alert alert-primary" role="alert">
    ${nameRole} ${fio} ${email}
    </div>`;

    let employeeInfo = document.querySelector("#employee-info-js");
    employeeInfo.innerHTML = $alert;
    show(employeeInfo);



}