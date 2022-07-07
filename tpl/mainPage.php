<?php
    defined( 'ABSPATH' ) || die('<p style="background: #ff00003b; padding: 24px; font-family: sans-serif; border-radius: 8px;">access denied :)</p>'); ?>
    <script>
        function getPersionDate(date,id){
            const persionDate= new Date(date).toLocaleDateString("fa-IR",{
                year: "numeric",
                month: "2-digit",
                day : "2-digit",
                hour:"2-digit",
                minute:"2-digit",
                second:"2-digit",
            });
            document.getElementById(id).innerText=persionDate;
        }

    </script>
<div class="container rsu-admin-page">
    <div class="row header">
        <div class="col rsu-title">
            <span class="rsu-icon-title"><img src="<?php echo ASSETS_PATH . 'media/rsu-title-search.svg' ?>"
                    alt=""></span>
            <h1 class="rsu-admin-page">ردیاب جستجو رزسا</h1>
        </div>
    </div>
    <div class="row options">

        <div class="col rsu-filter">
            <span class="filter-by">فیلتر بر اساس :</span>
            <div class="form-check">
                <input class="form-check-input" type="radio" checked name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    جستجو های اخیر
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    جستجو های پرطرفدار
                </label>
            </div>
        </div>
        <div class="col sru-options">
            <button id="btnExport" onclick="ExportToExcel()">خروجی اکسل </button>
        </div>

    </div>
    <div class="row rsu-table">
        <div class="col rsu-result-table">
            <table id="table" class="table table-text-search">
                <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">متن جستجو</th>
                        <th scope="col">زمان جستجو</th>
                        <th scope="col">شناسه کاربر</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($result = 0 ; count($resultstb) > $result ; $result++ ){ ?>
                    <tr>
                        <td scope='row'><?php echo $paginate + $result+1 ?></th>
                        <td><?php echo $resultstb[$result]->searched_text ?></td>
                        <td class="search-time" id="<?= $result ?>"><script>getPersionDate("<?= $resultstb[$result]->searched_at ?>",<?= $result ?>)</script></td>
            
                        <td><?php echo $resultstb[$result]->userid ?></td>
                    </tr><?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="rozesa-filters-pagination">
            <?php
            if($pageCount > 1){
            for ($i = 1; $i <= $pageCount ; $i++): ?>
                <div class="rozesa-filters-pagination__item" data-value="<?= $i ?>">
                    <a class="rozesa-filters-pagination__link" href="<?= add_query_arg( 'result', $i , $_SERVER['REQUEST_URI']) ?>"><?= $i ?></a>
                </div>
            <?php endfor; };
            ?>
        </div>
    </div>

</div>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript">
  function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('table');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('Rozesa-export.' + (type || 'xlsx')));
  }

</script>
