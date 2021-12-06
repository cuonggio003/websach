###Run Command:
- cp .env.example .env
- composer update
- config database 
- php artisan migrate --seed
- php artisan key:generate
- php artisan storage:link
- php artisan serve

###Yêu cầu:
- Hoàn thiện quản lý sách, thể loại sách
- Validate dữ liệu toàn bộ các form



success: function(res){
    let html = "";
    res.forEach(function (item, index){
        html +=
        '<li data-id= "' + item.id + '" class = "list-group-item-action book-item">';
        html += item.name;
        html
    })
}