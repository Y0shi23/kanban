
class Todo {
    constructor() {
        this.ROOT_URL = document.getElementsByTagName('html')[0].dataset.url;
        this.JSON_URL = this.ROOT_URL != null ? this.ROOT_URL + "api/articles" : location.protocol + '//' + location.host + "/api/articles";
    }
    getListing() {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", this.JSON_URL);
        // xhr.setRequestHeader('Content-Type', this.JSON_CONTENT_TYPE);
        xhr.send();

        let orsc = function() {
            if(xhr.readyState === 4 && xhr.status === 200) {
                //データを取得後の処理を書く
                // let jsonData = JSON.parse(xhr.responseText);
                console.log(JSON.parse(xhr.response));
            } else {
                console.log('Oops, no response.');
            }
        }
        xhr.onreadystatechange = orsc;
    }
}
let todo = new Todo();
todo.getListing();