/* ============================================================================
   Goshgar.Az — frontend behaviours
   Author: Goshgar Hasanzadeh
   ----------------------------------------------------------------------------
   Vanilla JS, no dependencies. Idempotent (safe to re-run).
   ========================================================================= */
(function () {
  'use strict';

  /* ----- Lucide icon refresh helper -------------------------------------- */
  function refreshIcons() {
    if (window.lucide && typeof window.lucide.createIcons === 'function') {
      window.lucide.createIcons();
    }
  }

  /* ----- Password show / hide toggle ------------------------------------- */
  function bindPasswordToggles(root) {
    var toggles = (root || document).querySelectorAll('[data-pw-toggle]');
    toggles.forEach(function (btn) {
      if (btn.__bound) return;
      btn.__bound = true;
      btn.addEventListener('click', function () {
        var sel = btn.getAttribute('data-pw-toggle');
        var input = sel ? document.querySelector(sel) : null;
        if (!input) return;
        var show = input.type === 'password';
        input.type = show ? 'text' : 'password';

        var iEye = btn.querySelector('[data-pw-show]');
        var iOff = btn.querySelector('[data-pw-hide]');
        if (iEye && iOff) {
          if (show) { iEye.setAttribute('hidden', ''); iOff.removeAttribute('hidden'); }
          else      { iOff.setAttribute('hidden', ''); iEye.removeAttribute('hidden'); }
        }
        input.focus({ preventScroll: true });
      });
    });
  }

  /* ----- Toast dismiss --------------------------------------------------- */
  function bindToastClose(root) {
    var closers = (root || document).querySelectorAll('[data-toast-close]');
    closers.forEach(function (btn) {
      if (btn.__bound) return;
      btn.__bound = true;
      btn.addEventListener('click', function () {
        var toast = btn.closest('.toast');
        if (!toast) return;
        toast.classList.add('toast--leaving');
        setTimeout(function () { toast.remove(); }, 220);
      });
    });

    /* Auto-dismiss after 5s */
    document.querySelectorAll('.toast:not([data-persistent])').forEach(function (t) {
      if (t.__autoDismiss) return;
      t.__autoDismiss = true;
      setTimeout(function () {
        if (!t.isConnected) return;
        t.classList.add('toast--leaving');
        setTimeout(function () { t.remove(); }, 220);
      }, 5000);
    });
  }

  /* ----- Form: native invalid -> visual flag ---------------------------- */
  function bindFormFeedback(root) {
    var inputs = (root || document).querySelectorAll('input, select, textarea');
    inputs.forEach(function (el) {
      if (el.__bound) return;
      el.__bound = true;
      el.addEventListener('invalid', function () { el.classList.add('is-invalid'); });
      el.addEventListener('input',   function () {
        if (el.checkValidity && el.checkValidity()) el.classList.remove('is-invalid');
      });
      el.addEventListener('blur',    function () {
        if (el.value && el.checkValidity && !el.checkValidity()) el.classList.add('is-invalid');
      });
    });
  }

  /* ----- Smooth-scroll for in-page anchors ------------------------------- */
  function bindSmoothScroll() {
    document.addEventListener('click', function (ev) {
      var a = ev.target.closest('a[href^="#"]');
      if (!a) return;
      var id = a.getAttribute('href');
      if (!id || id === '#') return;
      var target = document.querySelector(id);
      if (!target) return;
      ev.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      target.setAttribute('tabindex', '-1');
      target.focus({ preventScroll: true });
    });
  }

  /* ----- Mobile nav toggle ---------------------------------------------- */
  function bindMobileNav() {
    var btn = document.querySelector('[data-nav-toggle]');
    var nav = document.querySelector('[data-nav-target]');
    if (!btn || !nav || btn.__bound) return;
    btn.__bound = true;
    btn.addEventListener('click', function () {
      var open = nav.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', String(open));
    });
  }

  /* ----- Init ------------------------------------------------------------ */
  function init() {
    refreshIcons();
    bindPasswordToggles();
    bindToastClose();
    bindFormFeedback();
    bindSmoothScroll();
    bindMobileNav();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  /* Expose for re-init after AJAX swaps */
  window.GoshgarUI = { init: init, refreshIcons: refreshIcons };
})();
