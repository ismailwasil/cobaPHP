<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <?php 
            function isPalindrome($string) {
                if (strrev($string) == $string) {
                    return true; // It is a palindrome
                } else {
                    return false; // It is not a palindrome
                }
            }

        // Example usage:
        $word1 = "Kasur rusaK";

        echo (isPalindrome($word1)?"yes <br>":"no <br>");

        echo date('l', mktime(0,0,0,2,1,1998));



    ?>
    <br>
    <input type="date" name="" id="">
    <br>
    <style>
        #container {
        width: 400px;
        height: 300px;
        /* border: 2px solid #333; */
        position: relative;
        overflow: hidden;
        }

        #btn {
        position: absolute;
        transition: all 0.3s ease; /* animasi smooth */
        }
    </style>

    <div id="container">
        <button id="btn" onclick="alert('Hahahahah Bisa diklik')">Klik Saya</button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const btn = document.getElementById("btn");
            btn.innerHTML="Gak bisa diklik";
            btn.setAttribute('style','cursor: not-allowed;')
            btn.removeAttribute('onclick')
        });
    </script>
    <script>
    const btn = document.getElementById("btn");
    const container = document.getElementById("container");

    // simpan posisi awal
    const initialX = btn.offsetLeft;
    const initialY = btn.offsetTop;

    let idleTimer;

    // ======================
    // 🔥 LOGIKA ASLI (tidak diubah)
    // ======================
    function handleMove(e) {
        clearTimeout(idleTimer);

        const rect = btn.getBoundingClientRect();
        const containerRect = container.getBoundingClientRect();

        const mouseX = e.clientX;
        const mouseY = e.clientY;

        // ======================
        // 1. Tombol kabur
        // ======================
        const btnCenterX = rect.left + rect.width / 2;
        const btnCenterY = rect.top + rect.height / 2;

        const distance = Math.hypot(
            mouseX - btnCenterX,
            mouseY - btnCenterY
        );

        if (distance < 100) {
            const maxX = container.clientWidth - btn.offsetWidth;
            const maxY = container.clientHeight - btn.offsetHeight;

            btn.style.left = Math.random() * maxX + "px";
            btn.style.top = Math.random() * maxY + "px";
        }

        // ======================
        // 2. Idle → balik
        // ======================
        idleTimer = setTimeout(() => {

            const startArea = {
                left: containerRect.left + initialX,
                right: containerRect.left + initialX + btn.offsetWidth,
                top: containerRect.top + initialY,
                bottom: containerRect.top + initialY + btn.offsetHeight
            };

            const isCursorInStartArea =
                mouseX >= startArea.left &&
                mouseX <= startArea.right &&
                mouseY >= startArea.top &&
                mouseY <= startArea.bottom;

            if (!isCursorInStartArea) {
                btn.style.left = initialX + "px";
                btn.style.top = initialY + "px";
            }

        }, 800);
    }

    // ======================
    // ✅ POINTER EVENTS (SEMUA DEVICE)
    // ======================
    container.addEventListener("pointermove", handleMove);
    container.addEventListener("pointerdown", handleMove);

    // ======================
    // ❌ Anti klik total
    // ======================
    btn.addEventListener("click", (e) => {
        e.preventDefault();
    });

    btn.addEventListener("pointerdown", (e) => {
        e.preventDefault();
    });
    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

  </body>
</html>
