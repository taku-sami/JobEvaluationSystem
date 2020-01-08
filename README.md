Name  
Web 人事考課システム  

Overview  
社員の人事考課をWeb上で行うことができるシンプルなシステムです。 

以下アドレスに公開しています。  
http://job-evaluation-system.herokuapp.com/  
※デバックモードをonにしているため、500エラーが起きたらデバック画面が表示されます。　　

使用したCLI  
heroku(https://data.heroku.com/)  
DB  
postgrel  

##　補足事項  
現時点本番環境で実装できていない機能  

１　メール認証が機能してないことが起因のもの  
　　　・ユーザーの新規登録  
　　　・パスワード変更  
２　CSV  
　　エクスポート（空の表が出力される）  

ローカル環境でも実装できていない機能  

バリデーションによる入力制限が未完成です。  
ユーザーのメールアドレスなどはユニーク処理していますが、エラーがおきた時の画面を用意していないため、  
現時点では500エラーがおきます。  

## Description  
このシステムには３種類のユーザーが存在します。  
それぞれの役割は以下のとおりです。  

【システム管理者】  
管理者画面へログインできる。  
管理者画面では主に以下が可能。  
  ・評価者の進捗状況（承認実施）の確認  
  ・システムログの確認  
  ・部署の追加、編集、削除  
  ・役職の追加、編集、削除  
  ・社員の追加、編集、削除  
  ・考課の追加、編集、削除  
  ・考課はcsvで追加することもできます。テンプレートは以下です。(ヘッダー以下を適宜変更して使用してください。)
  https://drive.google.com/open?id=1fbATps58tLIR0rpwgs6lWMZd7UTV5mRW

【被評価者】  
社員の個人ページのみログイン可能  
個人ページでは主に以下が可能。  
　・目標の登録  
　・自己評価の登録  
　・評価結果の閲覧  
　・自身の目標・評価の承認進捗状況の確認  

【評価者（被評価者の上長）】  
評価者には１次承認者と２次承認者がいる。  
それぞれの評価者の個人ページのみログイン可能  
評価者ページでは主に以下が可能。  
　・被評価者の目標の確認、差戻、承認  
　・被評価者の評価  
　・被評価者個別ページの閲覧  
　・目標、評価の進捗状況及び評価結果を数で確認  
  ・社員検索  
 ※被評価者は自身が所属する部署内の社員のみ  
 
## Usage  
【管理者】  
１　管理者ユーザーでログイン  
　　メールアドレス：admin2@gmail.com  
    パスワード：password  
２　必要に応じマスタでデータを操作  
　　初期で以下のユーザー、マスタが保存されているのでデータ操作なしでもすぐ利用できます。  
   ※現時点ではユーザー新規登録ができません。用意されているユーザーで使用ください。  
　　　最初に用意しているユーザーは以下の通りです。  
   (1)開発部  
   　　役職：被評価者  
      アドレス：devstaff@gmail.com  
      役職：被評価者  
      アドレス：devboss1@gmail.com  
      役職：被評価者  
      アドレス：devboss2@gmail.com  
      
  (2)人事部  
      役職：被評価者  
      アドレス：hrstaff@gmail.com  
      役職：被評価者  
      アドレス：hrboss1@gmail.com  
      役職：被評価者  
      アドレス：hrboss2@gmail.com  

  (3)営業部  
      役職：被評価者  
      アドレス：salestaff@gmail.com  
      役職：被評価者  
      アドレス：sallboss1@gmail.com  
      役職：被評価者  
      アドレス：saleboss2@gmail.com  
※パスワードは全て「password」です  
【被評価者、承認者】  
３　被評価者でログイン  
　　２で登録した新規ユーザーか初期ユーザーを利用してください。
  　パスワードは「password」です。  
４　目標の登録  
　　一覧のセルをクリックすると目標登録画面に遷移します。  
  　それぞれの考課に応じた目標を入力してください。  
５　１次承認者でログイン  
　　４で目標登録をした社員と同じ部署の１次承認者でログインしてください。  
６　１次承認  
　　内容を確認し承認をクリックすれば承認完了です。  
７　２次承認者でログイン  
　　５番同様です。  
８　２次承認  
　　６番同様です。（１次承認者⇒２次承認者という順番のみ承認可能です。）  
  ※６、８で差戻をクリックした場合は４番に戻ります。（社員の目標再登録が必要となります。）  
９　社員ユーザーでログイン  
　　３番同様です。  
10　評価登録  
   ８番の作業が終了したら社員は目標に対する評価を登録できます。  
　　C(低) → → SS(高)となっています。  
  　なお、社員の評価は最終評価に影響しないので、上長が評価する際の参考としています。  
11  １次承認者でログイン  
　　 5番同様  
12  １次承認  
　　10番と同様に評価してください。  
13  ２次承認者でログイン  
　　７番同様  
14　２次評価  
　　12番同様  
15　評価確定  
　　12番と14番で登録した評価によって最終的な評価が自動的に確定します。  
  　この評価が社員の評価となります。  
