(function () {
  var forms = document.querySelectorAll('.bd-search form, .bd-filter-panel form');
  forms.forEach(function (form) {
    form.addEventListener('submit', function () {
      Array.prototype.slice.call(form.elements).forEach(function (field) {
        if (field.name && field.value === '') {
          field.disabled = true;
        }
      });
    });
  });

  function updateRanges() {
    document.querySelectorAll('.bd-range input[type="range"]').forEach(function (range) {
      var label = range.previousElementSibling;
      var syncName = range.getAttribute('data-sync-field');
      var syncInput = syncName ? document.querySelector('input[name="' + syncName + '"]') : null;
      var display = syncName ? document.querySelector('[data-range-display="' + syncName + '"]') : null;
      if (!label) return;
      var value = label.querySelector('span');

      function setValue(nextValue, source) {
        var min = Number(range.min || 0);
        var max = Number(range.max || 1000);
        var cleaned = Math.min(max, Math.max(min, Number(nextValue || 0)));
        range.value = cleaned;
        if (syncInput && source !== syncInput && (source || syncInput.value !== '')) syncInput.value = cleaned;
        if (value) value.textContent = cleaned;
        if (display) display.textContent = cleaned;
      }

      setValue(syncInput && syncInput.value !== '' ? syncInput.value : range.value, null);
      range.addEventListener('input', function () {
        setValue(range.value, range);
      });
      if (syncInput) {
        syncInput.addEventListener('input', function () {
          setValue(syncInput.value, syncInput);
        });
      }
    });
  }

  function updateLoan() {
    var price = document.getElementById('bd-loan-price');
    var ratio = document.getElementById('bd-loan-ratio');
    var rate = document.getElementById('bd-loan-rate');
    var years = document.getElementById('bd-loan-years');
    var result = document.getElementById('bd-loan-result');
    if (!price || !ratio || !rate || !years || !result) return;

    function calc() {
      var principal = Number(price.value || 0) * 1000000000 * Number(ratio.value || 0) / 100;
      var monthlyRate = Number(rate.value || 0) / 100 / 12;
      var months = Number(years.value || 0) * 12;
      if (!principal || !monthlyRate || !months) {
        result.textContent = '--';
        return;
      }
      var payment = principal * monthlyRate * Math.pow(1 + monthlyRate, months) / (Math.pow(1 + monthlyRate, months) - 1);
      result.textContent = Math.round(payment / 1000000).toLocaleString('vi-VN') + ' triệu/tháng';
    }

    [price, ratio, rate, years].forEach(function (field) {
      field.addEventListener('input', calc);
    });
    calc();
  }

  function updateCost() {
    var price = document.getElementById('bd-cost-price');
    var renovation = document.getElementById('bd-cost-renovation');
    var buffer = document.getElementById('bd-cost-buffer');
    var result = document.getElementById('bd-cost-result');
    if (!price || !renovation || !buffer || !result) return;

    function calc() {
      var base = Number(price.value || 0) * 1000;
      var taxAndNotary = base * 0.025;
      var renovationCost = base * Number(renovation.value || 0) / 100;
      var bufferCost = base * Number(buffer.value || 0) / 100;
      var total = base + taxAndNotary + renovationCost + bufferCost;
      result.textContent = Math.round(total).toLocaleString('vi-VN') + ' triệu';
    }

    [price, renovation, buffer].forEach(function (field) {
      field.addEventListener('input', calc);
    });
    calc();
  }

  function updateFeng() {
    var year = document.getElementById('bd-feng-year');
    var direction = document.getElementById('bd-feng-direction');
    var result = document.getElementById('bd-feng-result');
    if (!year || !direction || !result) return;

    function calc() {
      var y = Number(year.value || 0);
      if (!y) {
        result.textContent = '--';
        return;
      }
      var group = y % 2 === 0 ? 'Đông tứ mệnh' : 'Tây tứ mệnh';
      var goodEast = ['Đông', 'Nam', 'Bắc', 'Đông Nam'];
      var matched = group === 'Đông tứ mệnh' ? goodEast.indexOf(direction.value) !== -1 : goodEast.indexOf(direction.value) === -1;
      result.textContent = group + (matched ? ' · hướng đang chọn khá hợp' : ' · nên kiểm tra thêm hướng phụ');
    }

    [year, direction].forEach(function (field) {
      field.addEventListener('input', calc);
      field.addEventListener('change', calc);
    });
    calc();
  }

  function updateToolTabs() {
    var triggers = document.querySelectorAll('[data-bd-tool]');
    var panels = document.querySelectorAll('.bd-tool-panel');
    if (!triggers.length || !panels.length) return;

    function activate(id) {
      triggers.forEach(function (trigger) {
        trigger.classList.toggle('active', trigger.getAttribute('data-bd-tool') === id);
      });
      panels.forEach(function (panel) {
        panel.classList.toggle('active', panel.id === id);
      });
    }

    triggers.forEach(function (trigger) {
      trigger.addEventListener('click', function (event) {
        event.preventDefault();
        activate(trigger.getAttribute('data-bd-tool'));
      });
    });

    if (window.location.hash && document.querySelector(window.location.hash + '.bd-tool-panel')) {
      activate(window.location.hash.substring(1));
    } else {
      activate('loan');
    }
  }

  function updateLocale() {
    var country = document.querySelector('[data-bd-country]');
    var language = document.querySelector('[data-bd-language]');
    var label = document.querySelector('[data-bd-locale-label]');
    if (!country || !language || !label) return;

    var countryLabels = {
      vn: 'Việt Nam',
      us: 'United States',
      jp: 'Japan',
      kr: 'Korea'
    };
    var languageLabels = {
      vi: 'Tiếng Việt',
      en: 'English',
      ja: '日本語',
      ko: '한국어'
    };
    var dictionary = {
      vi: {
        nav_listing: 'Nhà đất bán & cho thuê',
        nav_projects: 'Dự án',
        nav_news: 'Tin tức',
        nav_analysis: 'Phân tích đánh giá',
        nav_directory: 'Danh bạ',
        login: 'Đăng nhập',
        register: 'Đăng ký',
        logout: 'Đăng xuất',
        post_property: 'Đăng tin',
        filter_title: 'Bộ lọc',
        search: 'Tìm kiếm',
        locale_title: 'Quốc gia & Ngôn ngữ'
      },
      en: {
        nav_listing: 'Sale & rent listings',
        nav_projects: 'Projects',
        nav_news: 'News',
        nav_analysis: 'Market insights',
        nav_directory: 'Directory',
        login: 'Sign in',
        register: 'Register',
        logout: 'Sign out',
        post_property: 'Post listing',
        filter_title: 'Filters',
        search: 'Search',
        locale_title: 'Country & Language'
      },
      ja: {
        nav_listing: '売買・賃貸物件',
        nav_projects: 'プロジェクト',
        nav_news: 'ニュース',
        nav_analysis: '市場分析',
        nav_directory: 'ディレクトリ',
        login: 'ログイン',
        register: '登録',
        logout: 'ログアウト',
        post_property: '掲載する',
        filter_title: 'フィルター',
        search: '検索',
        locale_title: '国と言語'
      },
      ko: {
        nav_listing: '매매 및 임대',
        nav_projects: '프로젝트',
        nav_news: '뉴스',
        nav_analysis: '시장 분석',
        nav_directory: '디렉터리',
        login: '로그인',
        register: '회원가입',
        logout: '로그아웃',
        post_property: '매물 등록',
        filter_title: '필터',
        search: '검색',
        locale_title: '국가 및 언어'
      }
    };

    function apply() {
      var locale = {
        country: country.value,
        language: language.value
      };
      localStorage.setItem('bd_locale', JSON.stringify(locale));
      label.textContent = countryLabels[locale.country] + ' / ' + languageLabels[locale.language];
      document.documentElement.lang = locale.language;
      document.querySelectorAll('[data-i18n]').forEach(function (node) {
        var key = node.getAttribute('data-i18n');
        if (dictionary[locale.language] && dictionary[locale.language][key]) {
          node.textContent = dictionary[locale.language][key];
        }
      });
    }

    try {
      var saved = JSON.parse(localStorage.getItem('bd_locale') || '{}');
      if (saved.country) country.value = saved.country;
      if (saved.language) language.value = saved.language;
    } catch (error) {}

    country.addEventListener('change', apply);
    language.addEventListener('change', apply);
    apply();
  }

  function updateAnalysisScore() {
    var price = document.getElementById('bd-analysis-price');
    var area = document.getElementById('bd-analysis-area');
    var loan = document.getElementById('bd-analysis-loan');
    var yieldInput = document.getElementById('bd-analysis-yield');
    var score = document.getElementById('bd-analysis-score');
    var note = document.getElementById('bd-analysis-note');
    var ppm = document.getElementById('bd-analysis-ppm');
    if (!price || !area || !loan || !yieldInput || !score || !note || !ppm) return;

    function calc() {
      var p = Number(price.value || 0);
      var a = Number(area.value || 0);
      var l = Number(loan.value || 0);
      var y = Number(yieldInput.value || 0);
      if (!p || !a) {
        score.textContent = '--';
        note.textContent = 'Nhập giá và diện tích để phân tích.';
        ppm.textContent = '--';
        return;
      }
      var pricePerMeter = p * 1000 / a;
      var valueScore = Math.max(0, 40 - Math.max(0, pricePerMeter - 80) * 0.22);
      var leverageScore = Math.max(0, 30 - Math.max(0, l - 55) * 0.55);
      var yieldScore = Math.min(30, y * 5);
      var total = Math.round(Math.max(0, Math.min(100, valueScore + leverageScore + yieldScore)));
      score.textContent = total + '/100';
      ppm.textContent = Math.round(pricePerMeter).toLocaleString('vi-VN');
      note.textContent = total >= 75 ? 'Tín hiệu tốt, có thể ưu tiên xem kỹ pháp lý và giá khu vực.' : total >= 55 ? 'Mức trung bình, nên so sánh thêm 3-5 tin cùng khu vực.' : 'Rủi ro cao, cần kiểm tra lại giá/m² hoặc tỷ lệ vay.';
    }

    [price, area, loan, yieldInput].forEach(function (field) {
      field.addEventListener('input', calc);
    });
    calc();
  }

  function updateAnalysisTabs() {
    var tabs = document.querySelectorAll('[data-analysis-tab]');
    var panels = document.querySelectorAll('[data-analysis-panel]');
    if (!tabs.length || !panels.length) return;

    function activate(name) {
      tabs.forEach(function (tab) {
        tab.classList.toggle('active', tab.getAttribute('data-analysis-tab') === name);
      });
      panels.forEach(function (panel) {
        panel.classList.toggle('active', panel.getAttribute('data-analysis-panel') === name);
      });
    }

    tabs.forEach(function (tab) {
      tab.addEventListener('click', function (event) {
        event.preventDefault();
        var name = tab.getAttribute('data-analysis-tab');
        activate(name);
        history.replaceState(null, '', tab.getAttribute('href'));
      });
    });

    var initial = window.location.hash ? document.querySelector('[href="' + window.location.hash + '"]') : null;
    activate(initial ? initial.getAttribute('data-analysis-tab') : 'price');
  }

  function updateAnalysisTools() {
    var city = document.getElementById('bd-chart-city');
    var type = document.getElementById('bd-chart-type');
    var budget = document.getElementById('bd-chart-budget');
    var chartResult = document.getElementById('bd-chart-result');
    if (city && type && budget && chartResult) {
      function updateChartResult() {
        var value = Number(budget.value || 0);
        var label = value >= 15 ? 'Có thể xem nhóm trung tâm hoặc nhà phố.' : value >= 8 ? 'Phù hợp căn hộ và khu vực đang phát triển.' : 'Nên ưu tiên căn hộ diện tích vừa hoặc khu vực vệ tinh.';
        chartResult.textContent = city.value + ' · ' + type.value + ': ' + label;
      }
      [city, type, budget].forEach(function (field) {
        field.addEventListener('input', updateChartResult);
        field.addEventListener('change', updateChartResult);
      });
      updateChartResult();
    }

    var preview = document.getElementById('bd-video-preview');
    document.querySelectorAll('[data-video-title]').forEach(function (button) {
      button.addEventListener('click', function () {
        if (!preview) return;
        preview.textContent = button.getAttribute('data-video-title') + ': tóm tắt các điểm cần kiểm tra, gồm vị trí, giá/m², pháp lý, tiến độ và khả năng khai thác dòng tiền.';
      });
    });

    var riskPrice = document.getElementById('bd-risk-price');
    var riskLoan = document.getElementById('bd-risk-loan');
    var riskLegal = document.getElementById('bd-risk-legal');
    var riskResult = document.getElementById('bd-risk-result');
    if (riskPrice && riskLoan && riskLegal && riskResult) {
      function updateRisk() {
        var loan = Number(riskLoan.value || 0);
        var price = Number(riskPrice.value || 0);
        var legalPenalty = riskLegal.value === 'check' ? 25 : 0;
        var score = Math.max(0, 100 - Math.max(0, loan - 50) - Math.max(0, price - 8) * 3 - legalPenalty);
        riskResult.textContent = score >= 75 ? 'Rủi ro thấp' : score >= 50 ? 'Rủi ro trung bình' : 'Rủi ro cao';
      }
      [riskPrice, riskLoan, riskLegal].forEach(function (field) {
        field.addEventListener('input', updateRisk);
        field.addEventListener('change', updateRisk);
      });
      updateRisk();
    }
  }

  function updateNewsHub() {
    var openers = document.querySelectorAll('[data-news-open]');
    var panels = document.querySelectorAll('.bd-news-detail');
    if (!openers.length || !panels.length) return;

    function showOverview() {
      panels.forEach(function (panel) {
        panel.hidden = true;
      });
      document.body.classList.remove('bd-news-modal-open');
      if (window.history && window.history.replaceState) {
        window.history.replaceState(null, '', window.location.pathname + window.location.search);
      }
    }

    function showPanel(id) {
      var target = document.getElementById(id);
      if (!target) return;
      panels.forEach(function (panel) {
        panel.hidden = panel !== target;
      });
      document.body.classList.add('bd-news-modal-open');
    }

    openers.forEach(function (opener) {
      opener.addEventListener('click', function (event) {
        event.preventDefault();
        showPanel(opener.getAttribute('data-news-open'));
      });
    });

    document.querySelectorAll('[data-news-back]').forEach(function (button) {
      button.addEventListener('click', showOverview);
    });

    panels.forEach(function (panel) {
      panel.addEventListener('click', function (event) {
        if (event.target === panel) {
          showOverview();
        }
      });
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && document.body.classList.contains('bd-news-modal-open')) {
        showOverview();
      }
    });

    if (window.location.hash && document.querySelector(window.location.hash + '.bd-news-detail')) {
      showPanel(window.location.hash.slice(1));
    }
  }

  updateRanges();
  updateLoan();
  updateCost();
  updateFeng();
  updateToolTabs();
  updateLocale();
  updateAnalysisScore();
  updateAnalysisTabs();
  updateAnalysisTools();
  updateNewsHub();

  document.querySelectorAll('[data-bd-modal-open]').forEach(function (trigger) {
    trigger.addEventListener('click', function (event) {
      var target = document.querySelector(trigger.getAttribute('href'));
      if (!target) return;
      event.preventDefault();
      target.classList.add('is-open');
      target.setAttribute('aria-hidden', 'false');
    });
  });

  document.querySelectorAll('[data-bd-modal-close]').forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      var modal = trigger.closest('.bd-modal');
      if (!modal) return;
      modal.classList.remove('is-open');
      modal.setAttribute('aria-hidden', 'true');
    });
  });

  document.querySelectorAll('.bd-modal').forEach(function (modal) {
    modal.addEventListener('click', function (event) {
      if (event.target === modal) {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
      }
    });
  });

  if (window.location.hash) {
    var hashModal = document.querySelector(window.location.hash + '.bd-modal');
    if (hashModal) {
      hashModal.classList.add('is-open');
      hashModal.setAttribute('aria-hidden', 'false');
    }
  }

  document.querySelectorAll('.bd-branch-toggle').forEach(function (button) {
    button.addEventListener('click', function () {
      var list = button.parentElement.querySelector('.bd-branch-list');
      if (list) list.classList.toggle('is-open');
    });
  });
})();
