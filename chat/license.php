<?php
require("inc.php");
$link = connect_db();
$ref = rand(10000, 1000000);

$original_author = "ChatN!ck";
$modern_author   = "Goshgar Hasanzadeh";
$github          = "Goshgar Hasanzadeh";
$author          = $modern_author;
$version         = "auto 1.4 — Modern Edition";
$year_to         = date("Y");

$_v->title("Skript haqqında", 'center');
$_v->fsize1('<small>');
?>
<style>
.lic-wrap { line-height: 1.7; text-align: left; }
.lic-wrap h1 { font-size: 22px; margin: 18px 0 10px; background: linear-gradient(135deg,#667eea,#764ba2); -webkit-background-clip: text; background-clip: text; color: transparent; }
.lic-wrap h2 { font-size: 17px; margin: 22px 0 8px; padding: 8px 12px; background: linear-gradient(135deg,#667eea,#764ba2); color:#fff; border-radius: 8px; }
.lic-wrap h3 { font-size: 15px; margin: 14px 0 6px; color: var(--primary); }
.lic-wrap p { margin: 6px 0; }
.lic-wrap ul { margin: 4px 0 10px 18px; padding: 0; }
.lic-wrap li { margin: 2px 0; }
.lic-wrap code { background: var(--primary-soft); padding: 1px 6px; border-radius: 4px; font-size: 13px; }
.lic-wrap .tag { display: inline-block; background: var(--primary-soft); color: var(--primary); padding: 1px 8px; border-radius: 10px; font-size: 12px; margin-right: 4px; }
.lic-wrap .author-card { background: linear-gradient(135deg,#667eea,#764ba2); color:#fff; padding: 18px; border-radius: 12px; text-align: center; margin: 16px 0; }
.lic-wrap .author-card .name { font-size: 22px; font-weight: 700; }
.lic-wrap .author-card .role { font-size: 13px; opacity: 0.9; margin-top: 4px; }
.lic-wrap hr { border: 0; border-top: 1px solid var(--border); margin: 16px 0; }
</style>

<div class="menu lic-wrap">

<h1><?php echo htmlspecialchars($version); ?></h1>
<p><b>Skriptin tam təsviri və istifadə qaydaları</b></p>

<div class="author-card">
  <div style="font-size:11px; opacity:0.85; letter-spacing:1px;">ORIJINAL MÜƏLLIF</div>
  <div class="name"><?php echo htmlspecialchars($original_author); ?></div>
  <div class="role">auto 1.4 — Original Edition</div>
  <hr style="border:0; border-top:1px solid rgba(255,255,255,0.25); margin:14px 0;"/>
  <div style="font-size:11px; opacity:0.85; letter-spacing:1px;">MODERN EDITION</div>
  <div class="name"><?php echo htmlspecialchars($modern_author); ?></div>
  <div class="role">GitHub: <?php echo htmlspecialchars($github); ?></div>
</div>

<p>© <?php echo $year_to; ?> Modernizasiya: <?php echo htmlspecialchars($modern_author); ?>. Orijinal: <?php echo htmlspecialchars($original_author); ?>. Bütün hüquqlar qorunur.</p>

<hr/>

<h2>1. Skript Haqqında</h2>

<p>
<b><?php echo htmlspecialchars($version); ?></b> — klassik <i>auto 1.4</i> WAP çat skriptinin
müasir HTML5 standartlarına uyğunlaşdırılmış, təhlükəsizlik baxımından gücləndirilmiş və
mobil cihazlar üçün uyğunlaşan interfeyslə tamamilə yenilənmiş versiyasıdır.
</p>

<p>
Skript PHP dilində yazılıb, MySQL/MariaDB verilənlər bazası ilə işləyir və
söhbət, qeydiyyat, mesajlaşma, forum, otaqlar, oyunlar, foto albomlar,
hədiyyə sistemi və geniş admin idarəetmə paneli kimi onlarla funksiyanı bir
yerdə təqdim edir.
</p>

<h3>Əsas üstünlüklər</h3>
<ul>
  <li>Müasir HTML5 + CSS3 interfeysi — mobil və masaüstü cihazlarda mükəmməl görünüş</li>
  <li>Bcrypt şifrələmə alqoritmi ilə təhlükəsiz parol saxlanışı</li>
  <li>SQL injection və XSS hücumlarına qarşı çoxqatlı qoruma</li>
  <li>UTF-8 dəstəyi — Azərbaycan, türk və digər əlifbaları tam dəstəkləyir</li>
  <li>Çoxsəviyyəli admin və moderator sistemi</li>
  <li>Real vaxt mesaj bildirişləri və səs xəbərdarlığı</li>
  <li>Geniş istifadəçi profili və albom sistemi</li>
</ul>

<hr/>

<h2>2. Sistem Tələbləri</h2>
<ul>
  <li><b>Server:</b> Apache 2.4+ və ya Nginx</li>
  <li><b>PHP:</b> 5.6 — 8.3 (tövsiyə olunan 7.4+)</li>
  <li><b>Verilənlər bazası:</b> MySQL 5.7+ və ya MariaDB 10.4+</li>
  <li><b>PHP modulları:</b> mysqli, pdo_mysql, gd, mbstring, curl, openssl, fileinfo</li>
  <li><b>Disk yaddaşı:</b> minimum 200 MB (foto və media fayllarını saxlamaq üçün)</li>
</ul>

<hr/>

<h2>3. Modulların Tam Siyahısı</h2>

<h3>3.1. Sistem və Konfiqurasiya</h3>
<ul>
  <li><code>BAZA.php</code> — Verilənlər bazası bağlantı parametrləri (host, istifadəçi, parol, baza adı). PDO bağlantısı və bcrypt funksiyaları burada müəyyən edilir.</li>
  <li><code>inc.php</code> — Bütün səhifələrə qoşulan əsas funksiyalar faylı: <code>connect_db()</code>, <code>check_login()</code>, sessiya idarəetməsi, hücum filtrləri.</li>
  <li><code>version.php</code> — İnterfeys çıxış sinfi. Səhifə başlığı, altyazı, formaların avtomatik yaradılması, header və footer hissələri burada idarə olunur.</li>
  <li><code>index.php</code> — Skriptin ana səhifəsi. Qeydiyyatsız qonaqlara giriş forması, statistika və xəbərlər göstərilir.</li>
  <li><code>error.php</code> — Xəta səhifəsi. Mövcud olmayan səhifələr və ya icazəsiz girişlər bu səhifəyə yönləndirilir.</li>
  <li><code>style.php</code> — Vizual mövzu seçicisi (köhnə versiya üçün; Modern Edition-da yalnız bir mövzu istifadə olunur).</li>
</ul>

<h3>3.2. Qeydiyyat və Giriş Sistemi</h3>
<ul>
  <li><code>reg.php</code> — Yeni istifadəçi qeydiyyatı forması. Ləqəb, parol, cins, doğum tarixi və əlavə məlumatlar daxil edilir.</li>
  <li><code>reghelp.php</code> — Qeydiyyat üçün izah və qaydalar.</li>
  <li><code>enter.php</code> — İstifadəçi girişi (login). Bcrypt ilə parol yoxlaması və köhnə base64 parolların avtomatik yenilənməsi.</li>
  <li><code>antireg.php</code> — Avtomatik (bot) qeydiyyatlara qarşı qoruma sistemi.</li>
  <li><code>antispam.php</code> — Qeydiyyat zamanı spam mesajlara və ardıcıl qeydiyyatlara qarşı yoxlamalar.</li>
  <li><code>anti_sql_injection.php</code> — SQL injection hücumlarını süzgəcdən keçirən mərkəzi filtr.</li>
  <li><code>capchat.php</code>, <code>img_code.php</code> — Şəkil əsaslı təsdiq kodu (CAPTCHA) yaradan modullar.</li>
  <li><code>session.php</code> — Sessiya idarəetməsi və cookie-lər.</li>
  <li><code>access.php</code> — Giriş icazələri və IP/brauzer qeydləri.</li>
</ul>

<h3>3.3. İstifadəçi Profili və Şəxsi Kabinet</h3>
<ul>
  <li><code>profile.php</code> — İstifadəçinin əsas profil səhifəsi.</li>
  <li><code>viewanket.php</code> — Anket/profil baxış səhifəsi (başqasının profilinə baxarkən).</li>
  <li><code>cabinet.php</code> — Şəxsi kabinet — tənzimləmələr, bildirişlər, dil seçimi, məxfilik parametrləri.</li>
  <li><code>hesab.php</code> — Bal və hesab idarəetməsi: balın xərclənməsi, xidmətlərin alınması.</li>
  <li><code>info.php</code>, <code>info_qov.php</code> — İstifadəçi haqqında ətraflı məlumat.</li>
  <li><code>kim.php</code> — "Kim" funksiyası — istifadəçinin hazırda harada olduğunu göstərir.</li>
  <li><code>change.php</code> — Profil məlumatlarının dəyişdirilməsi.</li>
  <li><code>color.php</code> — Ləqəb rənginin seçilməsi.</li>
  <li><code>znak_al.php</code> — İstifadəçi nişanının (znak) alınması.</li>
  <li><code>rnick.php</code> — Rusca/rəngarəng ləqəb sistemi.</li>
  <li><code>mega.php</code>, <code>meqa.php</code> — Premium "MeQa" ləqəb xidməti.</li>
  <li><code>like_nik.php</code> — Bəyənilən ləqəblərin siyahısı.</li>
  <li><code>melumat.php</code> — Profilə əlavə məlumat sahələri.</li>
</ul>

<h3>3.4. Mesajlaşma Sistemi</h3>
<ul>
  <li><code>chat.php</code> — Söhbət otağında ümumi mesajlaşma axını.</li>
  <li><code>chat.comment.php</code> — Mesajlara rəy bildirmə.</li>
  <li><code>mesaj.php</code> — Şəxsi mesajlar (yazılı poçt qutusu).</li>
  <li><code>mesajes.php</code> — Gələn və göndərilən mesajların siyahısı.</li>
  <li><code>messaje.php</code> — Mesaja baxış və cavab səhifəsi.</li>
  <li><code>msg.php</code>, <code>m_1.php</code>, <code>m_2.php</code> — Mesaj göndərməyə kömək edən modullar.</li>
  <li><code>delmsg.php</code>, <code>del.php</code> — Mesajların silinməsi əməliyyatları.</li>
  <li><code>mektub.php</code> — Məktub qutusu interfeysi.</li>
  <li><code>view_m.php</code>, <code>view_s.php</code> — Mesajlara və əlavələrə baxış.</li>
  <li><code>arxiv.php</code> — Köhnə mesajların arxivi.</li>
  <li><code>smile.php</code>, <code>smaylikler.php</code>, <code>smilein.php</code>, <code>fikirsmile.php</code> — Smayl (emoji) sistemi.</li>
</ul>

<h3>3.5. Otaqlar (Rooms)</h3>
<ul>
  <li><code>otaq.php</code> — Otaqların siyahısı.</li>
  <li><code>on.php</code>, <code>on_ferqli.php</code>, <code>onlayn.php</code>, <code>o_line.php</code> — Onlayn istifadəçilərin siyahısı və filtrləri.</li>
  <li><code>dehliz.php</code> — Dəhliz — istifadəçinin son giriş nöqtəsi.</li>
  <li><code>onoff.php</code> — Onlayn statusunun dəyişdirilməsi.</li>
  <li><code>kecid.php</code> — Otaqlararası keçid.</li>
</ul>

<h3>3.6. Forum və Müzakirə</h3>
<ul>
  <li><code>forum.php</code> — Əsas forum mövzularının siyahısı.</li>
  <li><code>topic.php</code> — Forum mövzusunun daxili.</li>
  <li><code>fikirler.php</code>, <code>fikirlerr.php</code> — İstifadəçi fikirlərinin siyahısı.</li>
  <li><code>fikiradd.php</code>, <code>fikiraddd.php</code> — Yeni fikrin (rəyin) əlavə edilməsi.</li>
</ul>

<h3>3.7. Foto və Albom Sistemi</h3>
<ul>
  <li><code>foto.php</code> — Profilə şəklin əlavə edilməsi.</li>
  <li><code>fotolike.php</code> — Şəkillərin bəyənilməsi.</li>
  <li><code>galery.php</code> — Foto qalereyasının siyahısı.</li>
  <li><code>img_a.php</code> — Alboma baxış (istifadəçinin bütün şəkilləri).</li>
  <li><code>sekil.php</code> — Pulsuz şəkillər bazası.</li>
  <li><code>show_foto.php</code>, <code>show_foto_start.php</code>, <code>show_photo.php</code> — Şəkillərin slayd rejimində izlənməsi.</li>
  <li><code>image.php</code>, <code>images.php</code> — Şəkil emalı və ölçü dəyişdirməsi.</li>
  <li><code>slide.php</code> — Slayd-şou.</li>
</ul>

<h3>3.8. Audio və MMS</h3>
<ul>
  <li><code>ses.php</code> — Səs fayllarının siyahısı.</li>
  <li><code>audiocapture.php</code> — Brauzerdə birbaşa səs yazılışı (mikrofon vasitəsilə).</li>
  <li><code>mms.php</code> — Multimedia mesajları (şəkil/video/səs əlavəli mesajlar).</li>
  <li><code>addfayl.php</code> — Fayl yükləyici.</li>
  <li><code>upload.php</code> — Server tərəfində yükləmə işləyicisi.</li>
  <li><code>sms_upload.php</code>, <code>onlinesms.php</code>, <code>online_sms.php</code> — Onlayn SMS xidmətinin modulları.</li>
</ul>

<h3>3.9. Hədiyyə Sistemi</h3>
<ul>
  <li><code>hediyye.php</code> — Hədiyyə kataloqu.</li>
  <li><code>hediyye_view.php</code> — Hədiyyəyə baxış səhifəsi.</li>
  <li><code>hediyye_user.php</code> — İstifadəçinin aldığı hədiyyələr.</li>
  <li><code>hediyye_panel.php</code>, <code>hediyye_upload.php</code> — Adminin hədiyyə əlavə etmə paneli.</li>
</ul>

<h3>3.10. Dostluq və Şəxslərarası Münasibətlər</h3>
<ul>
  <li><code>friends.php</code> — Dostlar siyahısı, dost əlavə etmə/silmə.</li>
  <li><code>ignor.php</code> — İqnor siyahısı (istifadəçinin məhdudlaşdırılması).</li>
  <li><code>sosial.php</code> — Sosial qruplaşma və əlaqə şəbəkəsi.</li>
  <li><code>blat.php</code> — Tanışlıq kanalı.</li>
  <li><code>gorushler.php</code> — Görüşlər.</li>
  <li><code>elaqe.php</code> — Adminlə əlaqə forması.</li>
  <li><code>plaint.php</code> — Şikayət göndərilməsi.</li>
  <li><code>arek.php</code> — Münasibət/ailə statusu.</li>
  <li><code>toy.php</code> — Toy/ad günü elanları.</li>
</ul>

<h3>3.11. Oyunlar və Əyləncə</h3>
<ul>
  <li><code>oyunlar.php</code> — Oyunlar mərkəzi.</li>
  <li><code>cards.php</code>, <code>functionscards.php</code> — Kart oyunları.</li>
  <li><code>mafia.php</code> — Mafiya oyunu.</li>
  <li><code>mduel.php</code>, <code>xo.php</code> — Duel oyunları.</li>
  <li><code>bilik.php</code> — Bilik yarışı (suallar və cavablar).</li>
  <li><code>lotereya.php</code> — Lotereya.</li>
  <li><code>football.php</code> — Futbol mərc oyunları.</li>
  <li><code>onun_yarisi.php</code> — At yarışı oyunu.</li>
  <li><code>hekaye.php</code> — İnteraktiv hekayələr.</li>
  <li><code>qefes.php</code> — Qəfəs/həbsxana ilə bağlı modul.</li>
  <li><code>mirt.php</code> — Mirt oyunu.</li>
</ul>

<h3>3.12. Səs Vermə və Reytinq</h3>
<ul>
  <li><code>votes.php</code> — Səsvermə formaları.</li>
  <li><code>reytinq.php</code> — Reytinq cədvəli.</li>
  <li><code>top.php</code> — Ən yaxşı istifadəçilər.</li>
  <li><code>aktivlik.php</code> — Aktivlik reytinqi.</li>
  <li><code>beyen.php</code>, <code>beyenilen.php</code> — Bəyənmə sistemi.</li>
  <li><code>qiymet.php</code> — Qiymətləndirmə.</li>
</ul>

<h3>3.13. Xəbərlər və Bildirişlər</h3>
<ul>
  <li><code>xeber.php</code>, <code>news.php</code> — Xəbər siyahısı və xəbərlərin əlavə edilməsi.</li>
  <li><code>yeninik.php</code> — Yeni qeydiyyatdan keçən istifadəçilər.</li>
  <li><code>bildiris.php</code> — Bildirişlər mərkəzi.</li>
  <li><code>xatire_panel.php</code> — Xatirə paneli (xüsusi tarixlər üçün).</li>
</ul>

<h3>3.14. Bal və Pul Sistemi</h3>
<ul>
  <li><code>bal_add.php</code> — Balın əlavə edilməsi (admin).</li>
  <li><code>bank.php</code> — Bal bankı və köçürmələr.</li>
  <li><code>exchange.php</code> — Bal/pul mübadiləsi.</li>
  <li><code>qepiy.php</code> — Qəpik (xırda valyuta) sistemi.</li>
  <li><code>vezife.php</code> — Vəzifə (rütbə) sistemi.</li>
  <li><code>rutbeal.php</code> — Rütbənin alınması.</li>
  <li><code>xal.php</code> — Xal sistemi.</li>
  <li><code>security_bal.php</code> — Təhlükəsizlik balı.</li>
  <li><code>id_al.php</code> — ID alınması.</li>
</ul>

<h3>3.15. Admin və Moderator Paneli</h3>
<ul>
  <li><code>admin.php</code> — Əsas admin paneli.</li>
  <li><code>panel.php</code>, <code>control.php</code> — Əlavə nəzarət panelləri.</li>
  <li><code>datpan.php</code> — DAT fayllarının idarəetmə paneli.</li>
  <li><code>security_panel.php</code> — Təhlükəsizlik paneli.</li>
  <li><code>filtr_panel.php</code>, <code>filtr.php</code> — Söz filtri paneli.</li>
  <li><code>sekil_panel.php</code>, <code>sekil_screen.php</code> — Şəkil moderasiyası paneli.</li>
  <li><code>rehberlik.php</code> — Rəhbərlik (baş moderator) paneli.</li>
  <li><code>s-admin.php</code> — Super adminin xüsusi paneli.</li>
  <li><code>icaze.php</code> — İcazələrin (rolların) idarəetməsi.</li>
</ul>

<h3>3.16. Moderasiya və Cəza Sistemi</h3>
<ul>
  <li><code>ban.php</code> — Ban (qadağa) idarəetməsi.</li>
  <li><code>ceza.php</code> — Cəza tədbirləri.</li>
  <li><code>blat.php</code> — Adminlər üçün xüsusi kanal.</li>
</ul>

<h3>3.17. Statistika və Tarix</h3>
<ul>
  <li><code>stat.php</code>, <code>statistic.php</code> — Sayt statistikası.</li>
  <li><code>stsonline.php</code> — Onlayn statistikası.</li>
  <li><code>tarix.php</code> — Tarixçə arxivi.</li>
</ul>

<h3>3.18. Domain və Reklam İdarəetməsi</h3>
<ul>
  <li><code>domen.php</code> — Domen konfiqurasiyası.</li>
  <li><code>reklam.php</code> — Reklamların idarəetməsi.</li>
  <li><code>gouid.php</code> — Reklam kliklərinin izlənilməsi.</li>
  <li><code>saytgo.php</code> — Sayta yönləndirmə.</li>
</ul>

<h3>3.19. Axtarış</h3>
<ul>
  <li><code>axtar.php</code> — Ümumi axtarış.</li>
  <li><code>a-axtar.php</code>, <code>a-search.php</code> — Filtrli geniş axtarış.</li>
  <li><code>users.php</code> — İstifadəçi siyahıları (yenilər, oğlanlar, qızlar).</li>
</ul>

<h3>3.20. Qaydalar və Yardım</h3>
<ul>
  <li><code>qayda.php</code>, <code>qaydalar.php</code> — Saytın qaydaları.</li>
  <li><code>license.php</code> — Bu sənəd (skript haqqında məlumat).</li>
  <li><code>pesi.php</code> — Peşə/sənət siyahısı.</li>
  <li><code>tel.php</code> — Telefon nömrəsi bölməsi.</li>
</ul>

<h3>3.21. 18+ Bölmə</h3>
<ul>
  <li><code>18+.php</code> — Yetkinlərə məxsus məzmun.</li>
</ul>

<h3>3.22. Boot və Yardımçı Funksiyalar</h3>
<ul>
  <li><code>boot.php</code> — İlkin işəsalma skriptləri.</li>
  <li><code>fun.php</code>, <code>function.php</code>, <code>funklar.php</code> — Ümumi funksiya kitabxanaları.</li>
  <li><code>logo.php</code>, <code>logo1.php</code> — Saytın loqosunu göstərən modullar.</li>
  <li><code>renglinik.php</code> — Rəngli ləqəb yaradıcısı.</li>
  <li><code>view_obiav.php</code> — Elanlara baxış.</li>
  <li><code>zng.php</code> — Zəng/bildiriş səsləri.</li>
  <li><code>umnik1.php</code>, <code>umnik3.php</code> — Aforizmlər və hikmətli sözlər.</li>
  <li><code>auto.php</code> — Avtomatik tapşırıqlar (cron tipli).</li>
</ul>

<hr/>

<h2>4. Verilənlər Bazası Strukturu</h2>
<p>
Skript MySQL/MariaDB-də 137-dən çox cədvəldən istifadə edir. Əsas cədvəllər:
</p>
<ul>
  <li><code>users</code> — İstifadəçi qeydləri (ləqəb, parol, profil məlumatları)</li>
  <li><code>chat</code> — Otaqlardakı mesajlar</li>
  <li><code>zapiski</code>, <code>mesaj</code> — Şəxsi məktublar və daxili mesajlar</li>
  <li><code>foto</code>, <code>albom</code> — Şəkillər və albomlar</li>
  <li><code>forum</code>, <code>topic</code>, <code>fikir</code> — Forum mövzuları və rəylər</li>
  <li><code>hediyye</code> — Hədiyyə tarixçəsi</li>
  <li><code>friends</code>, <code>ignor</code> — Sosial əlaqələr</li>
  <li><code>card_*</code>, <code>mafia_*</code>, <code>bilik</code>, <code>lotereya</code> — Oyun cədvəlləri</li>
  <li><code>bannlist</code>, <code>ceza</code> — Cəza qeydləri</li>
  <li><code>conf</code>, <code>data_reklam</code> — Sayt konfiqurasiyası və reklamlar</li>
  <li><code>stat</code>, <code>data_reg</code> — Statistika</li>
</ul>

<hr/>

<h2>5. Təhlükəsizlik</h2>
<p>Modern Edition-a əlavə edilən təhlükəsizlik qatları:</p>
<ul>
  <li><b>Bcrypt parol heşləməsi</b> — köhnə base64 parollar avtomatik olaraq bcrypt-ə keçirilir</li>
  <li><b>SQL injection filtri</b> — bütün GET/POST/COOKIE/SESSION sorğuları yoxlanılır</li>
  <li><b>XSS qoruması</b> — istifadəçi mətnləri HTML kodlaşdırmasından keçirilir</li>
  <li><b>Sessiya təhlükəsizliyi</b> — IP və brauzer dəyişdikdə xəbərdarlıq edilir</li>
  <li><b>Anti-bot</b> — qeydiyyat zamanı CAPTCHA və dövri yoxlama</li>
  <li><b>Anti-spam</b> — ardıcıl mesaj göndərilməsinin qarşısı alınır</li>
</ul>

<hr/>

<h2>6. Müəllif Hüquqları və İstifadə Qaydaları</h2>

<p>
<b>Orijinal müəllif:</b> <?php echo htmlspecialchars($original_author); ?><br/>
<b>Modern Edition:</b> <?php echo htmlspecialchars($modern_author); ?><br/>
<b>GitHub:</b> <?php echo htmlspecialchars($github); ?><br/>
<b>Versiya:</b> <?php echo htmlspecialchars($version); ?><br/>
<b>İl:</b> 2017 — <?php echo $year_to; ?>
</p>

<p>
Bu skript müəlliflik hüquqları ilə qorunur. Aşağıdakı qaydalara əməl olunmalıdır:
</p>
<ul>
  <li>Skriptdən istifadə etmək üçün müəllifdən icazə alınmalıdır</li>
  <li>Skriptdəki müəllif imzası silinməməlidir</li>
  <li>Skripti olduğu kimi yenidən satmaq qadağandır</li>
  <li>Dəyişikliklər üçün açıq mənbə tələb olunur</li>
  <li>Müəllif hər hansı zərərə görə məsuliyyət daşımır</li>
</ul>

<hr/>

<div style="text-align:center; padding:14px 0;">
  <span class="tag">PHP</span>
  <span class="tag">MySQL</span>
  <span class="tag">HTML5</span>
  <span class="tag">CSS3</span>
  <span class="tag">Responsive</span>
  <span class="tag">UTF-8</span>
</div>

<p style="text-align:center; color: var(--fg-muted); font-size:13px;">
  Designed &amp; Developed by <b><?php echo htmlspecialchars($author); ?></b><br/>
  © <?php echo $year_to; ?> — All rights reserved
</p>

<div style="text-align:center; padding:14px 0;">
  <a href="index.php?<?php echo $ref; ?>">« Ana Səhifə</a>
</div>

</div>
<?php
$_v->fsize2('</small>');
$_v->end('1', $link);
