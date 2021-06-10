const todoTable = document.querySelector("#todoBody")
const inputButton = document.querySelector("#inputButton")
const inputText = document.querySelector("#myInput")

inputButton.addEventListener("click",
    function () { nonEmptyEnter(inputText) })
inputText.addEventListener("keyup",
    function (e) { if (event.keyCode === 13) { nonEmptyEnter(e) } })

function nonEmptyEnter(e) {
    let textPassedIn
    if (e.type !== "text") {
        textPassedIn = e.target.value
    }
    else {
        textPassedIn = e.value
    }

    if (textPassedIn === "") { console.log("empty") }
    else if (textPassedIn !== "") {
        console.log(textPassedIn)
        createTodoItem(textPassedIn)
        inputText.value = ""
    }
}

function createTodoItem(e) {
    let todoItem = document.createElement("tr")
    todoItem.setAttribute("class", "row")
    todoItem.innerHTML =
        `<td>${e}</td>
    <td class="t_completed"></td>
    <td class="item_complete"> <input type="checkbox"> </td>`;

    todoTable.appendChild(todoItem)

    alternateColor()
    checkBoxEventSetter()
}

function alternateColor() {
    let rows = document.querySelectorAll(".row")
    let i;
    for (i = 0; i < rows.length; i++) {
        if (i % 2 === 0) {
            rows[i].style.backgroundColor = "#fbffe6"
        }
    }
}

function checkBoxEventSetter() {
    const inputCheckBoxs = document.querySelectorAll(".item_complete")
    let row = inputCheckBoxs[inputCheckBoxs.length - 1].parentElement
    inputCheckBoxs[inputCheckBoxs.length - 1].addEventListener("change",
        function () { taksComplete(row) })
}

function taksComplete(row) {
    if (row.childNodes[4].childNodes[1].checked) {
        row.childNodes[0].style.textDecoration = "line-through"
        row.childNodes[2].innerHTML = getDateWithFormat()
    }
    else {
        row.childNodes[0].style.textDecoration = "none"
        row.childNodes[2].innerHTML = ""
    }
}

function getDateWithFormat() {
    const theDate = new Date()
    const Year = theDate.getFullYear()
    const Month = theDate.getMonth();
    const Day = theDate.getDate();
    const hour = theDate.getHours();
    const min = theDate.getMinutes();
    const hour12 = (hour % 12 === 0 ? 12 : hour % 12)
    const min00 = (min < 10 ? "0" + min : min)
    const amPm = (hour / 12 >= 1 ? "PM" : "AM")

    const monthAbv = ["Jan", "Feb", "March", "April", "May", "June",
        "July", "Aug", "Sep", "Oct", "Nov", "Dec"];

    return monthAbv[Month] + " " + Day + ", " + Year + ", " + hour12 + ":" + min00 + " " + amPm;
}