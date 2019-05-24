

/*
* 生成分页
*/
function Paginator(total = 0, page = 1, size = 18, length = 5){

  var offset = Math.floor((length/2));
  var totalPage = Math.ceil(total/size);
  var from = (page + offset) > totalPage ? (totalPage - length + 1) : (page - offset);
  var end = (page + offset) < length ? length : (page + offset);
  var pageHtml = '<hr/>';

  if (total > 0) {
    pageHtml += '<p class="am-fl">共 ' + total + ' 条记录</p>';
    pageHtml += '<ol class="am-pagination am-fr">';
    // 上一页
    if (page > 1) {
       // class="am-disabled"
      pageHtml +=   '<li><a href="javascript:goPage(' + (page - 1) + ');">&laquo;</a></li>'; // 上一页
    }

    for (var i = from; i <= end; i++) {
      if (i > 0 && i <= totalPage) {
        if (i < page) {
          pageHtml += '<li><a href="javascript:goPage(' + i + ');">' + i + '</a></li>';
        }else if(i == page){
          pageHtml += '<li class="am-active"><a href="#">' + i + '</a></li>';
        }else{
          pageHtml += '<li><a href="javascript:goPage(' + i + ');">' + i + '</a></li>';
        }
      }        
    }

    // 下一页
    if ((page + 1) < totalPage && (i -1) < totalPage) {
      pageHtml +=   '<li><a href="javascript:goPage(' + (page + 1) + ');">&raquo;</a></li>';
    }
    pageHtml += '</ol>';
  }else{
    pageHtml = '<p class="am-fl">共 0 条记录</p>';
  }

  return pageHtml;
}