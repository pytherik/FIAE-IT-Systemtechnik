<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style2.css">
  <title>Document</title>
</head>
<body>

<h1>Responsive table fun</h1>
<p>
  Sometimes you have tabular data that needs to work on large and small screens alike, but viewing tables on small screens can be a nightmare. If you have to scroll horizontally to get to the end of each row, it's easy to lose track of which row you were on. This example uses a media query for small screens, and some nifty flexbox properties to turn each table row into it's own 'card' on smaller screens. Give your browser a stretch and try it out.
</p>
<h2>My Sweet Table</h2>
<table class="table">
  <tr>
    <th>Thing Number</th>
    <th>Thing 2</th>
    <th>Thing 3</th>
    <th>Thing 4</th>
    <th>Thing 5</th>
    <th>Thing 6</th>
    <th>The final thing!</th>
    <th class="empty"></th>
  </tr>
  <tr>
    <td>1</td>
    <td>some data</td>
    <td>other data</td>
    <td>ye?</td>
    <td>nay?</td>
    <td>smashing!</td>
    <td>yeah!</td>
    <td class="edit-buttons"><button class="edit">Edit</button><button class="delete">Delete</button></td>
  </tr>
  <tr>
    <td>2</td>
    <td>moar data</td>
    <td>oh</td>
    <td>bleep</td>
    <td>bloop</td>
    <td>blarp</td>
    <td>yadig?</td>
    <td class="edit-buttons"><button class="edit">Edit</button><button class="delete">Delete</button></td>
  </tr>
  <tr>
    <td>3</td>
    <td>evn mor dataz</td>
    <td>yup!</td>
    <td>boop</td>
    <td>bip</td>
    <td>bop</td>
    <td>yeah!</td>
    <td class="edit-buttons"><button class="edit">Edit</button><button class="delete">Delete</button></td>
  </tr>
  <tr>
    <td>4</td>
    <td>final data</td>
    <td>yeah!</td>
    <td>brap</td>
    <td>bwamp</td>
    <td>bwarp</td>
    <td>beep</td>
    <td class="edit-buttons"><button class="edit">Edit</button><button class="delete">Delete</button></td>
  </tr>
</table>
</body>
</html>
