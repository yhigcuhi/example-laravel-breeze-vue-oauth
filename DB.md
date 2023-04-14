顧客 (patient)
- id
- name
- address

施設(facility)
- id
- name
- address

契約 (contract)
- id
- patient_id
- course_id (患者様 コースごと1契約)
- contract_date (患者様 コースごと1契約だが 同じコース契約OKの意味で契約日もUnique)
- facility_id
- unit_price (契約時の単価)
- tax_category (契約時の対象外, 軽減, 軽減対象外)
- total_price (契約時の総額)

顧客 契約 施術実績 (patient_contract_used) (view)
- id (顧客 + 契約のid結合)
- patient_id
- contract_id
- treatment_count_used (消化回数:初期 0)
- program_id (現在のプログラム)
- next_program_id (次回のプログラム)

サービス (treatment)
- id
- patient_id
- facility_id
- program_id (プログラムと繋ぐとやっぱり辛いw => 患者様専用のプログラムと繋ぐジャないと「同じコースの契約」が表現できん)
- patient_program_id (こちらかな...)
- treatment_date

サービス詳細 (treatment_detail)
- id
- treatment_id
- menu_id
- price

コース (course)
- id
- name
- total_price
- total_treatment_count
- unit_price

プログラム (program)
- id
- course_id
- treatment_count
- menu_id

メニュー (menu)
- id
- name
- price
- tax_category (対象外, 軽減, 軽減対象外)

請求書 (receipt)
- id
- patient_id
- issue_date

請求書明細 (receipt)
- id
- receipt_id
- unit_price
- quantity
- tax_rate (その取引の税率)
- total_price

もし 商品もの場合
契約 (contract)
- id
- patient_id
- facility_id
- contract_date
- contract_type(商品との契約、サービスとの契約)

契約商品 (contract_products)
- id
- contract_id
- course_id (外部キー、契約種類がコースの場合のみ)
- product_id (外部キー、契約種類が商品の場合のみ)

商品 (products)
- id
- name
- unit_price
- tax_category (対象外, 軽減, 軽減対象外)