ERROR - 2024-02-18 14:53:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
LEFT JOIN `tweb_keluarga` `d` ON `u`.`id_kk` = `d`.`id`
LEFT JOIN `tweb_wil_cl' at line 24 - Invalid query: SELECT `u`.`id`, `u`.`nik`, `u`.`tanggallahir`, `u`.`tempatlahir`, `u`.`foto`, `u`.`status`, `u`.`status_dasar`, `u`.`id_kk`, `u`.`nama`, `u`.`nama_ayah`, `u`.`nama_ibu`, `u`.`alamat_sebelumnya`, `u`.`suku`, `u`.`bpjs_ketenagakerjaan`, `a`.`dusun`, `a`.`rw`, `a`.`rt`, `d`.`alamat`, `d`.`no_kk` AS `no_kk`, `u`.`kk_level`, `u`.`tag_id_card`, `u`.`created_at`, `u`.`sex` as `id_sex`, `u`.`negara_asal`, `u`.`tempat_cetak_ktp`, `u`.`tanggal_cetak_ktp`, `rc`.`id` as `status_covid`, `v`.`nama` AS `warganegara`, `l`.`inisial` as `bahasa`, `l`.`nama` as `bahasa_nama`, `u`.`ket`, `log`.`tgl_peristiwa`, `log`.`maksud_tujuan_kedatangan`, `log`.`tgl_lapor`, (CASE
				when u.status_kawin IS NULL then ''
				when u.status_kawin <> 2 then k.nama
				else
					case when u.akta_perkawinan = ''
						then 'KAWIN BELUM TERCATAT'
						else 'KAWIN TERCATAT'
					end
			end) as kawin, (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(u.tanggallahir)), '%Y')+0) AS umur, (DATE_FORMAT(FROM_DAYS(TO_DAYS(log.tgl_peristiwa)-TO_DAYS(u.tanggallahir)), '%Y')+0) AS umur_pada_peristiwa, `x`.`nama` AS `sex`, `sd`.`nama` AS `pendidikan_sedang`, `n`.`nama` AS `pendidikan`, `p`.`nama` AS `pekerjaan`, `g`.`nama` AS `agama`, `m`.`nama` AS `gol_darah`, `hub`.`nama` AS `hubungan`, `b`.`no_kk` AS `no_rtm`, `b`.`id` AS `id_rtm`
FROM ((SELECT (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(u.tanggallahir)), '%Y')+0) AS umur, `u`.*
FROM `tweb_penduduk` `u`
LEFT JOIN `tweb_keluarga` `d` ON `u`.`id_kk` = `d`.`id`
LEFT JOIN `tweb_wil_clusterdesa` `a` ON `d`.`id_cluster` = `a`.`id`
LEFT JOIN `tweb_wil_clusterdesa` `a2` ON `u`.`id_cluster` = `a2`.`id`
JOIN (
              SELECT    MAX(id) max_id, id_pend
              FROM      log_penduduk
              GROUP BY  id_pend
          ) log_max ON `log_max`.`id_pend` = `u`.`id`
JOIN `log_penduduk` `log` ON `log_max`.`max_id` = `log`.`id`
WHERE date_format(log.tgl_lapor, '%Y-%m') <= '2024-02'
AND `u`.`status` = 1
AND `u`.`status_dasar` IN(1, 4)
ORDER BY `u`.`nik`) as u)
LEFT JOIN `tweb_keluarga` `d` ON `u`.`id_kk` = `d`.`id`
LEFT JOIN `tweb_wil_clusterdesa` `a` ON `d`.`id_cluster` = `a`.`id`
LEFT JOIN `tweb_wil_clusterdesa` `a2` ON `u`.`id_cluster` = `a2`.`id`
LEFT JOIN `tweb_rtm` `b` ON `u`.`id_rtm` = `b`.`no_kk`
LEFT JOIN `tweb_penduduk_pendidikan_kk` `n` ON `u`.`pendidikan_kk_id` = `n`.`id`
LEFT JOIN `tweb_penduduk_pendidikan` `sd` ON `u`.`pendidikan_sedang_id` = `sd`.`id`
LEFT JOIN `tweb_penduduk_pekerjaan` `p` ON `u`.`pekerjaan_id` = `p`.`id`
LEFT JOIN `tweb_penduduk_kawin` `k` ON `u`.`status_kawin` = `k`.`id`
LEFT JOIN `tweb_penduduk_sex` `x` ON `u`.`sex` = `x`.`id`
LEFT JOIN `tweb_penduduk_agama` `g` ON `u`.`agama_id` = `g`.`id`
LEFT JOIN `tweb_penduduk_warganegara` `v` ON `u`.`warganegara_id` = `v`.`id`
LEFT JOIN `ref_penduduk_bahasa` `l` ON `u`.`bahasa_id` = `l`.`id`
LEFT JOIN `tweb_golongan_darah` `m` ON `u`.`golongan_darah_id` = `m`.`id`
LEFT JOIN `tweb_cacat` `f` ON `u`.`cacat_id` = `f`.`id`
LEFT JOIN `tweb_penduduk_hubungan` `hub` ON `u`.`kk_level` = `hub`.`id`
LEFT JOIN `tweb_sakit_menahun` `j` ON `u`.`sakit_menahun_id` = `j`.`id`
JOIN (
              SELECT    MAX(id) max_id, id_pend
              FROM      log_penduduk
              GROUP BY  id_pend
          ) log_max ON `log_max`.`id_pend` = `u`.`id`
JOIN `log_penduduk` `log` ON `log_max`.`max_id` = `log`.`id`
LEFT JOIN `ref_peristiwa` `ra` ON `ra`.`id` = `log`.`kode_peristiwa`
LEFT JOIN `covid19_pemudik` `c` ON `c`.`id_terdata` = `u`.`id`
LEFT JOIN `ref_status_covid` `rc` ON `c`.`status_covid` = `rc`.`nama`
ORDER BY `u`.`nik`
ERROR - 2024-02-18 14:55:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
LEFT JOIN `tweb_keluarga` `d` ON `u`.`id_kk` = `d`.`id`
LEFT JOIN `tweb_wil_cl' at line 24 - Invalid query: SELECT `u`.`id`, `u`.`nik`, `u`.`tanggallahir`, `u`.`tempatlahir`, `u`.`foto`, `u`.`status`, `u`.`status_dasar`, `u`.`id_kk`, `u`.`nama`, `u`.`nama_ayah`, `u`.`nama_ibu`, `u`.`alamat_sebelumnya`, `u`.`suku`, `u`.`bpjs_ketenagakerjaan`, `a`.`dusun`, `a`.`rw`, `a`.`rt`, `d`.`alamat`, `d`.`no_kk` AS `no_kk`, `u`.`kk_level`, `u`.`tag_id_card`, `u`.`created_at`, `u`.`sex` as `id_sex`, `u`.`negara_asal`, `u`.`tempat_cetak_ktp`, `u`.`tanggal_cetak_ktp`, `rc`.`id` as `status_covid`, `v`.`nama` AS `warganegara`, `l`.`inisial` as `bahasa`, `l`.`nama` as `bahasa_nama`, `u`.`ket`, `log`.`tgl_peristiwa`, `log`.`maksud_tujuan_kedatangan`, `log`.`tgl_lapor`, (CASE
				when u.status_kawin IS NULL then ''
				when u.status_kawin <> 2 then k.nama
				else
					case when u.akta_perkawinan = ''
						then 'KAWIN BELUM TERCATAT'
						else 'KAWIN TERCATAT'
					end
			end) as kawin, (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(u.tanggallahir)), '%Y')+0) AS umur, (DATE_FORMAT(FROM_DAYS(TO_DAYS(log.tgl_peristiwa)-TO_DAYS(u.tanggallahir)), '%Y')+0) AS umur_pada_peristiwa, `x`.`nama` AS `sex`, `sd`.`nama` AS `pendidikan_sedang`, `n`.`nama` AS `pendidikan`, `p`.`nama` AS `pekerjaan`, `g`.`nama` AS `agama`, `m`.`nama` AS `gol_darah`, `hub`.`nama` AS `hubungan`, `b`.`no_kk` AS `no_rtm`, `b`.`id` AS `id_rtm`
FROM ((SELECT (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(u.tanggallahir)), '%Y')+0) AS umur, `u`.*
FROM `tweb_penduduk` `u`
LEFT JOIN `tweb_keluarga` `d` ON `u`.`id_kk` = `d`.`id`
LEFT JOIN `tweb_wil_clusterdesa` `a` ON `d`.`id_cluster` = `a`.`id`
LEFT JOIN `tweb_wil_clusterdesa` `a2` ON `u`.`id_cluster` = `a2`.`id`
JOIN (
              SELECT    MAX(id) max_id, id_pend
              FROM      log_penduduk
              GROUP BY  id_pend
          ) log_max ON `log_max`.`id_pend` = `u`.`id`
JOIN `log_penduduk` `log` ON `log_max`.`max_id` = `log`.`id`
WHERE date_format(log.tgl_lapor, '%Y-%m') <= '2024-02'
AND `u`.`status` = 1
AND `u`.`status_dasar` IN(1, 4)
ORDER BY `u`.`nik`) as u)
LEFT JOIN `tweb_keluarga` `d` ON `u`.`id_kk` = `d`.`id`
LEFT JOIN `tweb_wil_clusterdesa` `a` ON `d`.`id_cluster` = `a`.`id`
LEFT JOIN `tweb_wil_clusterdesa` `a2` ON `u`.`id_cluster` = `a2`.`id`
LEFT JOIN `tweb_rtm` `b` ON `u`.`id_rtm` = `b`.`no_kk`
LEFT JOIN `tweb_penduduk_pendidikan_kk` `n` ON `u`.`pendidikan_kk_id` = `n`.`id`
LEFT JOIN `tweb_penduduk_pendidikan` `sd` ON `u`.`pendidikan_sedang_id` = `sd`.`id`
LEFT JOIN `tweb_penduduk_pekerjaan` `p` ON `u`.`pekerjaan_id` = `p`.`id`
LEFT JOIN `tweb_penduduk_kawin` `k` ON `u`.`status_kawin` = `k`.`id`
LEFT JOIN `tweb_penduduk_sex` `x` ON `u`.`sex` = `x`.`id`
LEFT JOIN `tweb_penduduk_agama` `g` ON `u`.`agama_id` = `g`.`id`
LEFT JOIN `tweb_penduduk_warganegara` `v` ON `u`.`warganegara_id` = `v`.`id`
LEFT JOIN `ref_penduduk_bahasa` `l` ON `u`.`bahasa_id` = `l`.`id`
LEFT JOIN `tweb_golongan_darah` `m` ON `u`.`golongan_darah_id` = `m`.`id`
LEFT JOIN `tweb_cacat` `f` ON `u`.`cacat_id` = `f`.`id`
LEFT JOIN `tweb_penduduk_hubungan` `hub` ON `u`.`kk_level` = `hub`.`id`
LEFT JOIN `tweb_sakit_menahun` `j` ON `u`.`sakit_menahun_id` = `j`.`id`
JOIN (
              SELECT    MAX(id) max_id, id_pend
              FROM      log_penduduk
              GROUP BY  id_pend
          ) log_max ON `log_max`.`id_pend` = `u`.`id`
JOIN `log_penduduk` `log` ON `log_max`.`max_id` = `log`.`id`
LEFT JOIN `ref_peristiwa` `ra` ON `ra`.`id` = `log`.`kode_peristiwa`
LEFT JOIN `covid19_pemudik` `c` ON `c`.`id_terdata` = `u`.`id`
LEFT JOIN `ref_status_covid` `rc` ON `c`.`status_covid` = `rc`.`nama`
ORDER BY `u`.`nik`
