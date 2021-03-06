<html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/stylesheets/main.css">
</head>
<body>
<div class="header">
    <?php include('header.php');?>
</div>

    <?php echo $content; ?>

<div class="footer">
    <?php include('footer.php');?>
</div>

<style>
    /* http://meyerweb.com/eric/tools/css/reset/
   v2.0 | 20110126
   License: none (public domain)
*/

    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td,
    article, aside, canvas, details, embed,
    figure, figcaption, footer, header, hgroup,
    menu, nav, output, ruby, section, summary,
    time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
    }
    /* HTML5 display-role reset for older browsers */
    article, aside, details, figcaption, figure,
    footer, header, hgroup, menu, nav, section {
        display: block;
    }
    body {
        line-height: 1;
    }
    ol, ul {
        list-style: none;
    }
    blockquote, q {
        quotes: none;
    }
    blockquote:before, blockquote:after,
    q:before, q:after {
        content: '';
        content: none;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    div#menu {
        background: #ffffff;
        margin-top: 4%;
        width: 25%;
        height: 80%;
        display: inline-table;
    }
    div#content {
        color: #949494;
        display: inline-block;
        width: 75%;
        position: absolute;
        height: 80%;
        margin-top: 4%;
        /*margin-left: -4px;*/
        font-size: 1.4em;
        background: #949494;
    }
    div#menu > ul {
        background: #0081bd;
        height: 100%;
        padding: 5%;
    }
    div#menu > ul > li {
        padding: 5%;
        border: 1px solid #fff;
        margin: 5% 0;
        text-decoration: none;
    }
    div#menu > ul > li:hover {
        background: #000;
    }
    div#menu > ul > li > a {
        color: #fff;
        width: 100%;
        display: block;
        text-decoration: none;
    }
    .header {
        background: #0080ff;
        position: absolute;
        top: 0%;
        height: 10%;
        width: 100%;
        display: block;
    }
    .logout_btn {
        float: right;
        display: inline-block;
    }
    .header_span {
        display: inline-block;
        margin-top: 20px;
        margin-left: 7%;
        font-size: 1.4em;
        color: #fff;
    }
    .logout_btn {
        float: right;
        margin-top: -1.8%;
        margin-right: 2%;
        display: inline-block;
        background: #ffffff;
        color: #0096ff;
        border: 1px solid #ffffff;
        padding: 5px;
        width: 10em;
    }
    .logout_btn:hover {
        background: #ffffff;
        color: #0097ff;
        border: 1px solid #009cff;
    }
    .footer {
        background: #c1c1c1;
        width: 100%;
        height:10%;
        text-align: center;
        vertical-align: middle;
        padding: 1em 0;
        color: #fff;
        line-height: 4em;
    }
    .account_info {
        color: #000000;
        position: relative;
        padding: 4em;
    }
    .account_info > span{
        font-size: 1.7em;
    }
    div#content > form {
        margin-top: 5%;
        margin-left: 15%;
    }
    div#content > form > input[type=password] {
        background: #ddd;
        border: 1px solid #999;
        width: 15em;
        line-height: 1.5em;
    }
    div#content > form > input[type=text] {
        background: #ddd;
        border: 1px solid #999;
        width: 15em;
        line-height: 1.5em;
    }
    div#content > form > input[type=number] {
        background: #ddd;
        border: 1px solid #999;
        width: 15em;
        line-height: 1.5em;
    }
    div#content > form > input[type=submit] {
        display: inline-block;
        background: #999;
        color: #fff;
        border: 1px solid #fff;
        padding: 5px;
        width: 10em;
    }
    div#content > form > input[type=submit]:hover {
        background: #fff;
        color: #666;
        border: 1px solid #666;
    }
    div#content > form > label {
        display: inline-block;
        float: left;
        width: 10em;
    }
    div#content > table {
        color: #fff;
        margin-top: 2em;
        margin-left: 1em;
        border: 1px solid #fff;
    }
    div#content a {
        color: #ddd;
        text-decoration: none;
    }
    div#content a:hover {
        color: #666;
        text-decoration: none;
    }
    div#content > table th, div#content > table td {
        border: 1px solid #fff;
        padding: 10px;
        font-size: 18px;
    }
    .list_span {
        color: white;
        margin-left: 1em;
        margin-top: 2em;
    }
    .a_to_list {
        margin-top: -4em;
        position: absolute;
        display: block;
        margin-left: 89%;
        border: 1px solid #fff;
        padding: 5px 10px;
        background: #fffeff;
        color: #fff !important;
    }
    .a_to_list:hover {
        border: 1px solid #999;
        background: #fff;
        color: #999 !important;
    }
    .delete_p {
        margin-top: 5%;
        margin-left: 9%;
    }
    .general {
        width:100%;
        height: 80%;
        background: #ccc;
        margin-top: 2.5%;
    }
    div.general > form > label {
        display: inline-block;
        float: left;
        width: 10em;
        color: #fff;
        font-size: 1.4em;
    }
    div.general > form {
        padding-top: 5%;
        margin-left: 15%;
    }
    div.general > form > input[type=password] {
        background: #ddd;
        border: 1px solid #999;
        width: 15em;
        margin-bottom: 1em;
        line-height: 1.5em;
    }
    div.general > form > input[type=text] {
        background: #ddd;
        border: 1px solid #999;
        width: 15em;
        margin-bottom: 1em;
        line-height: 1.5em;
    }
    div.general > form > input[type=number] {
        background: #ddd;
        border: 1px solid #999;
        width: 15em;
        margin-bottom: 1em;
        line-height: 1.5em;
    }
    div.general > form > input[type=submit] {
        display: inline-block;
        background: #999;
        color: #fff;
        margin-top: 2%;
        margin-left: 5%;
        border: 1px solid #fff;
        padding: 5px;
        width: 10em;
    }
    div.general > form > input[type=submit]:hover {
        background: #fff;
        color: #666;
        border: 1px solid #666;
    }
    .a_reg {
        margin-top: -1.5%;
        position: absolute;
        display: block;
        width: 6%;
        text-align: center;
        text-decoration: none;
        margin-left: 32%;
        border: 1px solid #fff;
        padding: 5px 10px;
        background: #999;
        color: #fff !important;
    }
    .a_reg:hover {
        border: 1px solid #666;
        background: #fff;
        color: #613fff !important;
    }
    .header_a {
        margin: auto;
        width: 20%;
        display: block;
        margin-top: -12px;
        font-size: 1.4em;
        text-align: center;
    }
    .header_a a {
        text-decoration: none;
        color: #ffffff;
        text-align: center;
        padding: 10%;
    }
    .header_a a:hover{
        color: #ffffff;
    }
    .shop {
        width:100%;
        height: 80%;
        background: #ffffff;
        margin-top: 2em;
        text-align: center;
    }
    .category_block {
        margin: 7em 2em 0;
        width: 35%;
        display: inline-block;
        border: 1px solid #613fff;
        text-align: center;
    }
    .category_block:hover {
        background: #fff;
        border: 1px solid #666;
    }
    .category_block:hover > a {
        color: #666;
    }
    .category_block > a {
        color: #373737;
        display: block;
        width: 100%;
        line-height: 3em;
        text-decoration: none;
        font-size: 2em;
    }
    .product_block {
        width: 15%;
        margin: 4em 2em;
        display: inline-block;
        border: 1px solid #fff;
        text-align: center;
    }
    .product_block > a {
        color: #000000;
        display: block;
        text-decoration: none;
        font-size: 2em;
    }
    .product_block > span {
        color: #fffeff;
        font-size: 1em;
    }
    .product_block > a > img {
        width: 100%;
        height:40%;
    }
    .product_block > span {
        color: #000000;
        padding: 5%;
        font-size: 1em;
        display: block;
    }
    .product_media > img {
        width: 75%;
        margin-top: 8%;
    }
    .product_media {
        width: 45%;
        display: inline-block;
    }
    .product_content {
        width: 45%;
        display: inline-block;
        vertical-align: middle;
        margin-top: -30%;
    }
    .product_content > span {
        color: #000000;
        padding: 1%;
        font-size: 1.2em;
        display: block;
    }

    .span_product_name {
        font-size: 3em !important;
    }
</style>

</body>

</html>