<!-- ========== All JS files linkup ========= -->
  <script src="<?php echo e(asset('build/assets/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('build/assets/js/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('build/assets/js/dynamic-pie-chart.js')); ?>"></script>
  <script src="<?php echo e(asset('build/assets/js/moment.min.js')); ?>"></script>
  <script src="<?php echo e(asset('build/assets/js/fullcalendar.js')); ?>"></script>
  <script src="<?php echo e(asset('build/assets/js/jvectormap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('build/assets/js/world-merc.js')); ?>"></script>
  <script src="<?php echo e(asset('build/assets/js/polyfill.js')); ?>"></script>
  <script src="<?php echo e(asset('build/assets/js/main.js')); ?>"></script>


  <script>
    // ======== jvectormap activation
    var markers = [
      { name: "Egypt", coords: [26.8206, 30.8025] },
      { name: "Russia", coords: [61.524, 105.3188] },
      { name: "Canada", coords: [56.1304, -106.3468] },
      { name: "Greenland", coords: [71.7069, -42.6043] },
      { name: "Brazil", coords: [-14.235, -51.9253] },
    ];

    var jvm = new jsVectorMap({
      map: "world_merc",
      selector: "#map",
      zoomButtons: true,

      regionStyle: {
        initial: {
          fill: "#d1d5db",
        },
      },

      labels: {
        markers: {
          render: (marker) => marker.name,
        },
      },

      markersSelectable: true,
      selectedMarkers: markers.map((marker, index) => {
        var name = marker.name;

        if (name === "Russia" || name === "Brazil") {
          return index;
        }
      }),
      markers: markers,
      markerStyle: {
        initial: { fill: "#4A6CF7" },
        selected: { fill: "#ff5050" },
      },
      markerLabelStyle: {
        initial: {
          fontWeight: 400,
          fontSize: 14,
        },
      },
    });
    // ====== calendar activation
    document.addEventListener("DOMContentLoaded", function () {
      var calendarMiniEl = document.getElementById("calendar-mini");
      var calendarMini = new FullCalendar.Calendar(calendarMiniEl, {
        initialView: "dayGridMonth",
        headerToolbar: {
          end: "today prev,next",
        },
      });
      calendarMini.render();
    });

    // =========== chart one start
    const ctx1 = document.getElementById("Chart1").getContext("2d");
    const chart1 = new Chart(ctx1, {
      type: "line",
      data: {
        labels: [
          "Jan",
          "Fab",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        datasets: [
          {
            label: "",
            backgroundColor: "transparent",
            borderColor: "#365CF5",
            data: [
              600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
            ],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#365CF5",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#fff",
            pointHoverBorderWidth: 5,
            borderWidth: 5,
            pointRadius: 8,
            pointHoverRadius: 8,
            cubicInterpolationMode: "monotone", // Add this line for curved line
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            callbacks: {
              labelColor: function (context) {
                return {
                  backgroundColor: "#ffffff",
                  color: "#171717"
                };
              },
            },
            intersect: false,
            backgroundColor: "#f9f9f9",
            title: {
              fontFamily: "Plus Jakarta Sans",
              color: "#8F92A1",
              fontSize: 12,
            },
            body: {
              fontFamily: "Plus Jakarta Sans",
              color: "#171717",
              fontStyle: "bold",
              fontSize: 16,
            },
            multiKeyBackground: "transparent",
            displayColors: false,
            padding: {
              x: 30,
              y: 10,
            },
            bodyAlign: "center",
            titleAlign: "center",
            titleColor: "#8F92A1",
            bodyColor: "#171717",
            bodyFont: {
              family: "Plus Jakarta Sans",
              size: "16",
              weight: "bold",
            },
          },
          legend: {
            display: false,
          },
        },
        responsive: true,
        maintainAspectRatio: false,
        title: {
          display: false,
        },
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
              max: 1200,
              min: 500,
            },
          },
          x: {
            grid: {
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
      },
    });
    // =========== chart one end

    // =========== chart two start
    const ctx2 = document.getElementById("Chart2").getContext("2d");
    const chart2 = new Chart(ctx2, {
      type: "bar",
      data: {
        labels: [
          "Jan",
          "Fab",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        datasets: [
          {
            label: "",
            backgroundColor: "#365CF5",
            borderRadius: 30,
            barThickness: 6,
            maxBarThickness: 8,
            data: [
              600, 700, 1000, 700, 650, 800, 690, 740, 720, 1120, 876, 900,
            ],
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            callbacks: {
              titleColor: function (context) {
                return "#8F92A1";
              },
              label: function (context) {
                let label = context.dataset.label || "";

                if (label) {
                  label += ": ";
                }
                label += context.parsed.y;
                return label;
              },
            },
            backgroundColor: "#F3F6F8",
            titleAlign: "center",
            bodyAlign: "center",
            titleFont: {
              size: 12,
              weight: "bold",
              color: "#8F92A1",
            },
            bodyFont: {
              size: 16,
              weight: "bold",
              color: "#171717",
            },
            displayColors: false,
            padding: {
              x: 30,
              y: 10,
            },
          },
        },
        legend: {
          display: false,
        },
        legend: {
          display: false,
        },
        layout: {
          padding: {
            top: 15,
            right: 15,
            bottom: 15,
            left: 15,
          },
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
              max: 1200,
              min: 0,
            },
          },
          x: {
            grid: {
              display: false,
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              drawTicks: false,
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
        plugins: {
          legend: {
            display: false,
          },
          title: {
            display: false,
          },
        },
      },
    });
    // =========== chart two end

    // =========== chart three start
    const ctx3 = document.getElementById("Chart3").getContext("2d");
    const chart3 = new Chart(ctx3, {
      type: "line",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        datasets: [
          {
            label: "Revenue",
            backgroundColor: "transparent",
            borderColor: "#365CF5",
            data: [80, 120, 110, 100, 130, 150, 115, 145, 140, 130, 160, 210],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#365CF5",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#365CF5",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
            fill: false,
            tension: 0.4,
          },
          {
            label: "Profit",
            backgroundColor: "transparent",
            borderColor: "#9b51e0",
            data: [
              120, 160, 150, 140, 165, 210, 135, 155, 170, 140, 130, 200,
            ],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#9b51e0",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#9b51e0",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
            fill: false,
            tension: 0.4,
          },
          {
            label: "Order",
            backgroundColor: "transparent",
            borderColor: "#f2994a",
            data: [180, 110, 140, 135, 100, 90, 145, 115, 100, 110, 115, 150],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#f2994a",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#f2994a",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
            fill: false,
            tension: 0.4,
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            intersect: false,
            backgroundColor: "#fbfbfb",
            titleColor: "#8F92A1",
            bodyColor: "#272727",
            titleFont: {
              size: 16,
              family: "Plus Jakarta Sans",
              weight: "400",
            },
            bodyFont: {
              family: "Plus Jakarta Sans",
              size: 16,
            },
            multiKeyBackground: "transparent",
            displayColors: false,
            padding: {
              x: 30,
              y: 15,
            },
            borderColor: "rgba(143, 146, 161, .1)",
            borderWidth: 1,
            enabled: true,
          },
          title: {
            display: false,
          },
          legend: {
            display: false,
          },
        },
        layout: {
          padding: {
            top: 0,
          },
        },
        responsive: true,
        // maintainAspectRatio: false,
        legend: {
          display: false,
        },
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
            },
            max: 350,
            min: 50,
          },
          x: {
            grid: {
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              drawTicks: false,
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
      },
    });
    // =========== chart three end

    // Dashboard activities search filter (debounced)
    (function () {
      function debounce(fn, delay) {
        var t;
        return function () {
          var args = arguments;
          clearTimeout(t);
          t = setTimeout(function () { fn.apply(null, args); }, delay || 300);
        };
      }

      var inp = document.getElementById('dashboard-search');
      var clearBtn = document.getElementById('dashboard-search-clear');
      if (!inp) return;

      function filterTable() {
        var q = inp.value.trim().toLowerCase();
        var tbody = document.querySelector('.top-selling-table tbody');
        if (!tbody) return;
        var rows = Array.from(tbody.querySelectorAll('tr'));
        var any = false;
        rows.forEach(function (r) {
          var text = Array.from(r.querySelectorAll('td')).slice(0,4).map(function (td) { return td.textContent.trim().toLowerCase(); }).join(' ');
          if (!q || text.indexOf(q) !== -1) {
            r.style.display = '';
            any = true;
          } else {
            r.style.display = 'none';
          }
        });
        // show no results row if none
        var noRow = tbody.querySelector('.no-results-row');
        if (!any) {
          if (!noRow) {
            var nr = document.createElement('tr');
            nr.className = 'no-results-row';
            nr.innerHTML = '<td colspan="5" class="text-center">Tidak ada hasil pencarian.</td>';
            tbody.appendChild(nr);
          }
        } else if (noRow) {
          noRow.remove();
        }
      }

      var handler = debounce(filterTable, 250);
      inp.addEventListener('input', handler);
      clearBtn && clearBtn.addEventListener('click', function () { inp.value = ''; handler(); inp.focus(); });
    })();

    // Informasi filter handler: listen for changes on #informasi-filter and redirect with ?range=... or ?per=...
    (function(){
      function applyInformasiFilter(){
        var selects = document.querySelectorAll('#informasi-filter');
        if(!selects || selects.length===0) return;

        selects.forEach(function(select){
          select.addEventListener('change', function(e){
            var val = (e.target.value || '').trim();
            var url = new URL(window.location.href);
            // remove previous range/per
            url.searchParams.delete('range');
            url.searchParams.delete('per');

            if(val === '' ){
              // keep other params removed
            } else if(val.indexOf('per:') === 0){
              var per = val.split(':')[1] || '';
              url.searchParams.set('per', per);
            } else {
              // treat as range
              url.searchParams.set('range', val);
            }

            // navigate to new url
            window.location.href = url.pathname + (url.search ? url.search : '');
          });
        });
      }

      if(document.readyState === 'loading'){
        document.addEventListener('DOMContentLoaded', applyInformasiFilter);
      } else {
        applyInformasiFilter();
      }
    })();

    // ================== chart four start
    const ctx4 = document.getElementById("Chart4").getContext("2d");
    const chart4 = new Chart(ctx4, {
      type: "bar",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [
          {
            label: "",
            backgroundColor: "#365CF5",
            borderColor: "transparent",
            borderRadius: 20,
            borderWidth: 5,
            barThickness: 20,
            maxBarThickness: 20,
            data: [600, 700, 1000, 700, 650, 800],
          },
          {
            label: "",
            backgroundColor: "#d50100",
            borderColor: "transparent",
            borderRadius: 20,
            borderWidth: 5,
            barThickness: 20,
            maxBarThickness: 20,
            data: [690, 740, 720, 1120, 876, 900],
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            backgroundColor: "#F3F6F8",
            titleColor: "#8F92A1",
            titleFontSize: 12,
            bodyColor: "#171717",
            bodyFont: {
              weight: "bold",
              size: 16,
            },
            multiKeyBackground: "transparent",
            displayColors: false,
            padding: {
              x: 30,
              y: 10,
            },
            bodyAlign: "center",
            titleAlign: "center",
            enabled: true,
          },
          legend: {
            display: false,
          },
        },
        layout: {
          padding: {
            top: 0,
          },
        },
        responsive: true,
        // maintainAspectRatio: false,
        title: {
          display: false,
        },
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
              max: 1200,
              min: 0,
            },
          },
          x: {
            grid: {
              display: false,
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
      },
    });
    // =========== chart four end
  </script>
  <script>
    // Centralized helpers using Bootstrap modal for confirmations (no SweetAlert)
    (function(){
      const csrfToken = '<?php echo e(csrf_token()); ?>';

      function ensureConfirmModal(){
        if(document.getElementById('confirmDeleteModal')) return document.getElementById('confirmDeleteModal');
        const div = document.createElement('div');
        div.innerHTML = `
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p class="mb-0" id="confirmDeleteMessage">Apakah Anda yakin ingin menghapus item ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" id="confirm-delete-btn" class="btn btn-sm btn-danger">Hapus</button>
              </div>
            </div>
          </div>
        </div>`;
        document.body.appendChild(div);
        return document.getElementById('confirmDeleteModal');
      }

      function showConfirm(message, onConfirm){
        const modalEl = ensureConfirmModal();
        modalEl.querySelector('#confirmDeleteMessage').textContent = message;
        const confirmBtn = modalEl.querySelector('#confirm-delete-btn');
        confirmBtn.disabled = false;
        // remove previous handler
        confirmBtn.replaceWith(confirmBtn.cloneNode(true));
        const newBtn = document.getElementById('confirm-delete-btn');
        const bsModal = new bootstrap.Modal(modalEl);
        modalEl.__bsModal = bsModal;
        newBtn.addEventListener('click', function(){
          newBtn.disabled = true;
          try{ onConfirm(); } catch(err){ console.error(err); bsModal.hide(); }
        });
        bsModal.show();
      }

      function initHelpers(){
        if(window.__dashboardHelpersInited) return; window.__dashboardHelpersInited = true;

        // Master checkbox handlers
        const masterSelectors = ['#select-all', '#bulk-select-all'];
        masterSelectors.forEach(sel => {
          const master = document.querySelector(sel);
          if(!master) return;
          master.addEventListener('change', function(){
            const checkboxes = document.querySelectorAll('.row-checkbox, .bulk-checkbox');
            checkboxes.forEach(cb => cb.checked = master.checked);
          });
        });

        // Bulk delete (uses modal)
        document.querySelectorAll('#bulk-delete-form').forEach(form => {
          form.addEventListener('submit', function(e){
            e.preventDefault();
            const checkboxes = Array.from(document.querySelectorAll('.row-checkbox, .bulk-checkbox'));
            const ids = checkboxes.filter(cb => cb.checked).map(cb => cb.value);
            if(ids.length === 0){
              showConfirm('Pilih setidaknya satu item untuk dihapus.', function(){ const modal = document.getElementById('confirmDeleteModal').__bsModal; modal.hide(); });
              return;
            }
            showConfirm('Anda akan menghapus ' + ids.length + ' item. Tindakan ini tidak dapat dibatalkan!', function(){
              const hidden = form.querySelector('#bulk-ids') || form.querySelector('input[name="ids"]'); if(hidden) hidden.value = ids.join(','); form.submit();
            });
          });
        });

        // Single-item delete via delegation (uses modal)
        document.addEventListener('click', function(e){
          const el = e.target.closest('[data-delete-url]');
          if(!el) return;
          e.preventDefault();
          const deleteUrl = el.dataset.deleteUrl;
          const itemName = el.dataset.roleName || el.dataset.role || el.dataset.name || '';
          showConfirm(itemName ? ('Anda akan menghapus "' + itemName + '". Tindakan ini tidak dapat dibatalkan!') : 'Tindakan ini tidak dapat dibatalkan! Apakah Anda yakin?', function(){
            const params = new URLSearchParams(); params.append('_token', csrfToken); params.append('_method', 'DELETE');
            fetch(deleteUrl, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }, body: params.toString() }).then(resp => {
              const modal = document.getElementById('confirmDeleteModal').__bsModal; if(resp.ok){
                const row = el.closest('tr'); if(row) row.remove(); else setTimeout(() => window.location.reload(), 200);
                modal.hide();
              } else {
                return resp.text().then(text => { throw new Error(text || ('Server responded with status ' + resp.status)); });
              }
            }).catch(err => { console.error('Delete failed:', err); const modal = document.getElementById('confirmDeleteModal').__bsModal; modal.hide(); alert('Gagal saat menghapus: ' + err.message); });
          });
        });
      }

      if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initHelpers); else initHelpers();
    })();
  </script><?php /**PATH C:\Users\Danir\pinha\resources\views/dashboard/partials/script.blade.php ENDPATH**/ ?>