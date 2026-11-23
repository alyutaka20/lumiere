
/* ========================================
   LUMIÈRE JavaScript
   セクション表示アニメーション
======================================== */


/* ----------------------------------------
   ① HTML要素を取得する
---------------------------------------- */

// HTMLから「fade-in」というクラスを持つ要素をすべて取得する
// 取得した複数の要素を fadeElements という変数に代入する
const fadeElements = document.querySelectorAll(".fade-in");


/* ----------------------------------------
   ② IntersectionObserverを作成する
---------------------------------------- */

// IntersectionObserverは、指定したHTML要素が
// 画面内に入ったかどうかを監視する仕組み

// observer という変数に監視機能を代入する
const observer = new IntersectionObserver((entries) => {

  // entriesには、監視している要素の状態が配列で渡される
  // forEachで、その配列の要素を1つずつ取り出す
  entries.forEach((entry) => {

    // entry.isIntersectingは、
    // 対象の要素が画面内に入っているかを表す
    if (entry.isIntersecting) {

      // 画面内に入った要素に「is-visible」というクラスを追加する
      // このクラスをCSS側で利用して表示アニメーションを実行する
      entry.target.classList.add("is-visible");

      // 一度表示した要素は監視する必要がないため、監視を解除する
      observer.unobserve(entry.target);

    }

  });

}, {

  // 要素が画面内に10%入った時点で処理を実行する
  threshold: 0.1

});


/* ----------------------------------------
   ③ 取得した要素を監視対象に登録する
---------------------------------------- */

// fadeElementsに入っているHTML要素を1つずつ取り出す
fadeElements.forEach((element) => {

  // observerに対して、取り出した要素の監視を開始する
  observer.observe(element);

});

/* ========================================
   ④ セクションごとのアンカー位置調整
======================================== */

// ページ内リンクをすべて取得する
const anchorLinks = document.querySelectorAll('a[href^="#"]');

// リンクを1つずつ取り出す
anchorLinks.forEach((link) => {

  // リンクがクリックされたときに実行する
  link.addEventListener("click", (event) => {

    // リンク先のIDを取得する
    const targetId = link.getAttribute("href");

    // #だけの場合は処理しない
    if (targetId === "#") return;

    // リンク先のセクションを取得する
    const targetElement = document.querySelector(targetId);

    // リンク先が存在しなければ終了する
    if (!targetElement) return;

    // 通常のアンカー移動を止める
    event.preventDefault();

    // セクションの画面上の位置を取得する
    const targetPosition =
      targetElement.getBoundingClientRect().top + window.scrollY;

    // PCとスマホで調整値を切り替える
    // const adjustment = window.innerWidth <= 768 ? 30 : -90;

    // 画面幅と移動先によって調整値を切り替える
    let adjustment;

    // スマートフォンの場合
    if (window.innerWidth <= 768) {

      adjustment = 30;

    // PCでACCESSへ移動する場合
    } else if (targetElement.id === "access") {

      adjustment = 50;

    // それ以外のPC表示
    } else {

      adjustment = -90;

    }

//lumieruの場合スクロールがアクセスの時だけ以上に下に下がっちゃうから上記のスクリプトで調整

    // 最終的なスクロール位置を計算する
    const scrollPosition = targetPosition - adjustment;

    // 計算した位置まで滑らかに移動する
    window.scrollTo({
      top: scrollPosition,
      behavior: "smooth"
    });

  });

});