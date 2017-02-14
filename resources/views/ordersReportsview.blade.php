
<html>
<head>
 	<meta charset='utf-8'>

<link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet">
           @extends('layouts.styles')

<style>
@font-face {
    font-family: arial;
    src: url(../resources/assets/css/arial.ttf) format('truetype');
    font-style: normal;
  font-weight: normal;
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
        background: rgba(154, 154, 154, 0.22);


  font-weight: 400;
font-family: 'Amiri', serif;
/*  font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', sans-serif;*/
  background-color: #fafafa;
}

td, th { padding: 8px; padding: .5rem;
     border: 1px solid #0089ff;
     text-align:center;

}

th {
  text-align: left;
  font-weight: 300;
  font-size: 20px;
  font-size: 1.25rem;
}

td { 

 }

.table {
  width: 100%;
  padding: 16px;
  padding: 1rem;
  
}

.table__heading { border-bottom: 2px solid #FFC842; }
 @media (max-width: 32rem) {
 .table__heading {
display: none;
}
 .table__content {
 display: block;
 padding: .5rem 0;
}
 .table__row {
 margin: .25rem 1rem;
 padding: .5rem 0;
 display: block;
 border-bottom: 2px solid #FFC842;
}
 .table__content:before {
 content: attr(data-heading);
 display: inline-block;
 width: 5rem;
 margin-right: .5rem;
 color: #999;
 font-size: .75rem;
 font-weight: 700;
 /*font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', sans-serif;*/
 text-transform: uppercase;
 letter-spacing: 2px;
}
}

h1, h2 {
  margin: 50px auto 50px auto;
  text-align: center;
      text-decoration: underline;
      
}

.page-break {
    page-break-after: always;
}

.page-num:before { content: counter(page); 
}
#headerrow{
    background: #fdff7f;
}
.deltails{
        display: block;
    border-bottom-style: groove;
     border-bottom-width:thin;
    

}
</style>


</head>



<body>
<section style="    margin-top: 10px;
">
  <!--for demo wrap-->
    <!--<p>Page <span class="page-num"></span></p>-->
  <!--<h1  class="page-break">Orders Report</h1>-->
    <span id="date" style="font-size: 90%;
    margin: 20px;"> {{$date}}<span>

  <h2  >ElFekr ElHerafie,Herafie App</h2>
  <h2  >Orders Report</h2>

   <div style="margin-bottom: 10px;
    margin-left:5%;
        margin-right:5%;
        text-align: center;

"> <span  class="deltails">From Date : {{$from}}</span>
    <span class="deltails">To Date : {{$to}}</span>
    <span class="deltails">Order Stutes : {{$stutes}}</span>
</div>
  <div class="tbl-header">
   <table class="table" id="table">
  <tr id="headerrow">
          <th>ID</th>
          
                                    	<th>Client</th>
                                    	<th>Adress</th>
                                    	<th>Main Service</th>
                                    	<th>Service Type</th>
                                        <th>Place Type</th>
                                        <th>On Date</th>
                                        <th>On Time</th>
                                        <th>Description</th>
                                        <th>Attached File</th>
                                        <th>Order Time</th>
                                         <th>Stutes</th>
  </tr>
  @foreach ($reportOrders as $order)

                                        <tr>
                                        	<td>{{$order->id}}</td>
                                            <td>{{$order->Client->mobile}}</td>
                                        	<td>{{$order->adressText}}</td>
                                            <td>{{$order->mainServiceType}}</td>
                                        	<td>{{$order->serviceType}}</td>
                                            <td>{{$order->placeType}}</td>
                                        	<td>{{$order->onDate}}</td>
                                        	<td>{{$order->onTime}}</td>
                                            <td>{{$order->textDescription}}</td>
                                        	<td>{{$order->fileDescription}}</td>
                                             <td>{{$order->created_at}}</td>
                                            <td>{{$order->orderStutes}}</td>
                                        </tr>
                                        @endforeach
</table>

  </div>
</section>



  <!--<div class="content">
            <div class="container-fluid">
                <div class="row">
              <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Finished Orders Today</h4>
                                <p class="category">Here is a subtitle for this table</p>

                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                       <th>ID</th>
                                    	<th>Client</th>
                                    	<th>Adress</th>
                                    	<th>Main Service</th>
                                    	<th>Service Type</th>
                                        <th>Place Type</th>
                                        <th>On Date</th>
                                        <th>On Time</th>
                                        <th>Description</th>
                                        <th>Attached File</th>
                                        <th>Order Time</th>
                                         <th>Stutes</th>
                                    </thead>
                                    <tbody>
                                 @foreach ($reportOrders as $order)

                                        <tr>
                                        	<td>{{$order->id}}</td>
                                            <td>{{$order->Client->mobile}}</td>
                                        	<td>{{$order->adressText}}</td>
                                            <td>{{$order->mainServiceType}}</td>
                                        	<td>{{$order->serviceType}}</td>
                                            <td>{{$order->placeType}}</td>
                                        	<td>{{$order->onDate}}</td>
                                        	<td>{{$order->onTime}}</td>
                                            <td>{{$order->textDescription}}</td>
                                        	<td>{{$order->fileDescription}}</td>
                                             <td>{{$order->created_at}}</td>
                                            <td>{{$order->orderStutes}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


              


                </div>
            </div>
        </div>-->
            <!--<p>Page <span class="page-num"></span></p>-->
                    <!--<script src="../resources/assets/js/jquery-1.10.2.js" type="text/javascript"></script>

  <script src='../resources/assets/js/pdfmake.min.js'></script>
 	<script src='../resources/assets/js/vfs_fonts.js'></script>

    <script>

  pdfMake.fonts={
   arial: {
     normal: '../resources/assets/css/arial.ttf',
     bold: '../resources/assets/css/arialbd.ttf',
     italics: '../resources/assets/css/ariali.ttf',
     bolditalics: '../resources/assets/css/arialbi.ttf'

  }};
     var docDefinition = { content: 'بسم الله الرحمن الرحيم',  defaultStyle: {
    font: 'arial '
  } };

 pdfMake.createPdf(docDefinition).open();
 pdfMake.createPdf(docDefinition).download('optionalName.pdf');



// pdfForElement('table').open();

function pdfForElement(id) {
  function ParseContainer(cnt, e, p, styles) {
    var elements = [];
    var children = e.childNodes;
    if (children.length != 0) {
      for (var i = 0; i < children.length; i++) p = ParseElement(elements, children[i], p, styles);
    }
    if (elements.length != 0) {
      for (var i = 0; i < elements.length; i++) cnt.push(elements[i]);
    }
    return p;
  }

  function ComputeStyle(o, styles) {
    for (var i = 0; i < styles.length; i++) {
      var st = styles[i].trim().toLowerCase().split(":");
      if (st.length == 2) {
        switch (st[0]) {
          case "font-size":
            {
              o.fontSize = parseInt(st[1]);
              break;
            }
          case "text-align":
            {
              switch (st[1]) {
                case "right":
                  o.alignment = 'right';
                  break;
                case "center":
                  o.alignment = 'center';
                  break;
              }
              break;
            }
          case "font-weight":
            {
              switch (st[1]) {
                case "bold":
                  o.bold = true;
                  break;
              }
              break;
            }
          case "text-decoration":
            {
              switch (st[1]) {
                case "underline":
                  o.decoration = "underline";
                  break;
              }
              break;
            }
          case "font-style":
            {
              switch (st[1]) {
                case "italic":
                  o.italics = true;
                  break;
              }
              break;
            }
        }
      }
    }
  }

  function ParseElement(cnt, e, p, styles) {
    if (!styles) styles = [];
    if (e.getAttribute) {
      var nodeStyle = e.getAttribute("style");
      if (nodeStyle) {
        var ns = nodeStyle.split(";");
        for (var k = 0; k < ns.length; k++) styles.push(ns[k]);
      }
    }

    switch (e.nodeName.toLowerCase()) {
      case "#text":
        {
          var t = {
            text: e.textContent.replace(/\n/g, "")
          };
          if (styles) ComputeStyle(t, styles);
          p.text.push(t);
          break;
        }
      case "b":
      case "strong":
        {
          //styles.push("font-weight:bold");
          ParseContainer(cnt, e, p, styles.concat(["font-weight:bold"]));
          break;
        }
      case "u":
        {
          //styles.push("text-decoration:underline");
          ParseContainer(cnt, e, p, styles.concat(["text-decoration:underline"]));
          break;
        }
      case "i":
        {
          //styles.push("font-style:italic");
          ParseContainer(cnt, e, p, styles.concat(["font-style:italic"]));
          //styles.pop();
          break;
          //cnt.push({ text: e.innerText, bold: false });
        }
      case "span":
        {
          ParseContainer(cnt, e, p, styles);
          break;
        }
      case "br":
        {
          p = CreateParagraph();
          cnt.push(p);
          break;
        }
      case "table":
        {
          var t = {
            table: {
              widths: [],
              body: []
            }
          }
          var border = e.getAttribute("border");
          var isBorder = false;
          if (border)
            if (parseInt(border) == 1) isBorder = true;
          if (!isBorder) t.layout = 'noBorders';
          ParseContainer(t.table.body, e, p, styles);

          var widths = e.getAttribute("widths");
          if (!widths) {
            if (t.table.body.length != 0) {
              if (t.table.body[0].length != 0)
                for (var k = 0; k < t.table.body[0].length; k++) t.table.widths.push("*");
            }
          } else {
            var w = widths.split(",");
            for (var k = 0; k < w.length; k++) t.table.widths.push(w[k]);
          }
          cnt.push(t);
          break;
        }
      case "tbody":
        {
          ParseContainer(cnt, e, p, styles);
          //p = CreateParagraph();
          break;
        }
      case "tr":
        {
          var row = [];
          ParseContainer(row, e, p, styles);
          cnt.push(row);
          break;
        }
      case "td":
        {
          p = CreateParagraph();
          var st = {
            stack: []
          }
          st.stack.push(p);

          var rspan = e.getAttribute("rowspan");
          if (rspan) st.rowSpan = parseInt(rspan);
          var cspan = e.getAttribute("colspan");
          if (cspan) st.colSpan = parseInt(cspan);

          ParseContainer(st.stack, e, p, styles);
          cnt.push(st);
          break;
        }
      case "div":
      case "p":
        {
          p = CreateParagraph();
          var st = {
            stack: []
          }
          st.stack.push(p);
          ComputeStyle(st, styles);
          ParseContainer(st.stack, e, p);

          cnt.push(st);
          break;
        }
      default:
        {
          console.log("Parsing for node " + e.nodeName + " not found");
          break;
        }
    }
    return p;
  }

  function ParseHtml(cnt, htmlText) {
    var html = $(htmlText.replace(/\t/g, "").replace(/\n/g, ""));
    var p = CreateParagraph();
    for (var i = 0; i < html.length; i++) ParseElement(cnt, html.get(i), p);
  }

  function CreateParagraph() {
    var p = {
      text: []
    };
    return p;
  }
  content = [];
  ParseHtml(content, document.getElementById(id).outerHTML);
  return pdfMake.createPdf({
    content: content
  });
}

</script>-->
</body>
</html>