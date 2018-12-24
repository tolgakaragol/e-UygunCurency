# e-UygunCurency
Api-Kur ilişkisini koruyarak sıralama yapar.<br>
Web arayüzünde en uygun döviz kurlarını ve sıralanmış listesini verir.<br>
Tüm işleyiş repository ve Currency klasörlerinde gerçekleşmektedir.<br>

# Commandlar
-Yeni Api Ekle           => php bin/console currency:new-provider <br>
-Tüm kurları güncelle    => php bin/console currency:update-all<br>
-Dolar kurunu güncelle   => php bin/console currency:update-usd<br>
-Euro kurunu güncelle    => php bin/console currency:update-eur<br>
-Sterlin kurunu güncelle => php bin/console currency:update-gbp<br>

# Testler
-ProviderA:ProviderB => Apilerden veri çeken sınıflar için hazırlanmış test.<br>
-AllProviders => Sistemdeki bütün providerlara bağlanarak yekün bir sonuç toplaması amaçlanmıştır.<br>
-AllComprator => Karşılaştırma ve sıralama methodlarını test eder.<br>
-Strategy => Strategy classının çalışmasını test eder.<br>
