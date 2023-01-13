function customTurtl(){

!(function (t) {
  if (true) {
    t.turtlEmbed = !0;
    var e,
      a,
      r,
      s = t.document,
      l = s.querySelectorAll("[data-turtl-script=embed]")[0],
      n = c(l);
    (a = function () {
      for (
        var e = s.querySelectorAll(".turtl-embed"), a = 0;
        a < e.length;
        a++
      ) {
        var r = c(e[a]),
          l =
            ((_ = r.storyId),
            void 0,
            ("https://assets.turtl.co") +
              "/covers/" +
              _ +
              ".jpg"),
          i = 2.5 * parseInt(r.width || 440),
          d = [
            "__turtl-teaser",
            "__turtl-animation-mode-" + (r.animationMode || "hover"),
            "ontouchstart" in s.documentElement ? " __touch" : "",
          ];
        if (
          ((e[a].className += " " + d.join(" ")),
          (e[a].innerHTML =
            '<span class="__turtl-teaser-text" style="color: ' +
            r.color +
            '">Click to read <svg class="__turtl-teaser-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 191"><path fill="currentColor" d="M152.2 113c-7.4-36-28-67.4-54.7-87C68.2 4 31.8-3.8 0 1.7c32 5.3 59 23.6 74.7 47C88.3 68.7 93.5 92 91.3 113H43.5l78.2 78 78.3-78h-47.8z"/></svg></span><div class="__turtl-teaser-wrap" style="perspective: ' +
            i +
            'px"><img class="__turtl-teaser-img" alt="' +
            e[a].title +
            '" src="' +
            l +
            '"/><span class="__turtl-teaser-right"> <img class="__turtl-teaser-img" role="presentation" src="' +
            l +
            '"/><span class="__turtl-teaser-tint"></span></span></div>'),
          "lightbox" === r.displayMode)
        ) {
          var u = t.location.search.replace("?", "&"),
            m = e[a].getAttribute("href") + "&lightbox=true" + u,
            p = o(m, r);
          e[a].addEventListener("click", p);
        }
      }
      var _;
    }),
      ((r = s.createElement("link")).rel = "stylesheet"),
      (r.type = "text/css"),
      (r.media = "screen"),
      (r.href = l.src.replace(/\.js/, ".css")),
      (r.onload = a),
      s.head.appendChild(r);
  }
  function o(a, r) {
    return function (l) {
      l.preventDefault(),
        (function (a, r) {
          (function () {
            if (!e) {
              (frame = s.createElement("iframe")),
                (frame.id = "__turtl-frame"),
                (frame.src = "about:blank"),
                ((e = s.createElement("div")).id = "__turtl-modal");
              var a = s.createElement("button");
              (a.id = "__turtl-close-btn"),
                a.addEventListener("click", i),
                t.addEventListener("message", r),
                t.addEventListener("onmessage", r),
                t.addEventListener("popstate", function (t) {
                  (t.state && t.state.turtlStoryId) || i();
                }),
                e.appendChild(a),
                e.appendChild(frame),
                s.body.appendChild(e);
            }
            function r(t) {
              var e;
              try {
                e = JSON.parse(t.data);
              } catch (t) {}
              e &&
                e.turtl &&
                e.turtl.message &&
                "didClickBackground" === e.turtl.message &&
                i();
            }
          })(),
            s.body.classList.add("__ttl-modal-open"),
            t.history &&
              t.history.pushState &&
              t.history.pushState({ ttlStoryId: r }, null);
          setTimeout(function () {
            frame.contentWindow.location.replace(
              a + "&embed=true&lightbox=true"
            ),
              (e.className = "__turtl-modal-showing"),
              (e.style.display = "block");
          });
        })(a, r.storyId);
    };
  }
  function i() {
    (e.className = "__turtl-modal-hiding"),
      s.body.classList.remove("__ttl-modal-open"),
      setTimeout(function () {
        (frame.src = "about:blank"),
          (e.className = ""),
          (e.style.display = "none");
      }, 300);
  }
  function c(t) {
    var e = {};
    return (
      [].forEach.call(t.attributes, function (t) {
        if (/^data-turtl-/.test(t.name)) {
          var a = t.name.substr(11).replace(/-(.)/g, function (t, e) {
            return e.toUpperCase();
          });
          e[a] = t.value;
        }
      }),
      e
    );
  }
})(window);
}