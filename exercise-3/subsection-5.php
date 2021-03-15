<style>
body {
    margin: 0;
    width: 100%;
    height: 100%;
    background-color: #3E3E3E;
    display: grid;
    place-items: center;
}

map {
    background-color: #4F4F4F;
}

section {
    position: relative;
}

.grid {
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;

    width: 100%;
    height: 100%;
    display: grid;
    grid-template: repeat(3, 1fr) / repeat(3, 1fr);
}

.grid > img {
    margin: 17px;
}
</style>

<main>
    <section>
        <img src="img/map.png" usemap="#board" alt="board">
        <div class="grid">
            <img src="img/circle.png" alt="o">
            <img src="img/cross.png" alt="x">
            <img src="img/circle.png" alt="o">
            <img src="img/cross.png" alt="x">
            <img src="img/circle.png" alt="o">
            <img src="img/cross.png" alt="x">
            <img src="img/circle.png" alt="o">
            <img src="img/circle.png" alt="o">
            <img src="img/circle.png" alt="o">
        </div>
    </section>

    <map name="board">
        <area shape="rect" coords="0,0,200,200" alt="Coffee" href="?x=0&y=0">
        <area shape="rect" coords="200,0,400,200" alt="Coffee" href="?x=0&y=1">
        <area shape="rect" coords="400,0,600,200" alt="Coffee" href="?x=0&y=2">

        <area shape="rect" coords="0,200,200,400" alt="Coffee" href="?x=1&y=0">
        <area shape="rect" coords="200,200,400,400" alt="Coffee" href="?x=1&y=1">
        <area shape="rect" coords="400,200,600,400" alt="Coffee" href="?x=1&y=2">

        <area shape="rect" coords="0,400,200,600" alt="Coffee" href="?x=2&y=0">
        <area shape="rect" coords="200,400,400,600" alt="Coffee" href="?x=2&y=1">
        <area shape="rect" coords="400,400,600,600" alt="Coffee" href="?x=2&y=2">
    </map>
</main>


<?php

