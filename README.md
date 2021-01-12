# Laravel 8 檢查應用程式是否使用已知安全漏洞的依賴套件

引入 sensiolabs 的 security-checker 套件來擴增應用程式是否使用已知安全漏洞的依賴套件檢查，如果有一個容易受到攻擊的依賴套件被駭客利用，就可能導致資料洩漏或伺服器被利用，且使用有漏洞的依賴套件，都會破壞應用程式的防護，讓各種攻擊形式接踵而來。這也意味著，許多開發者在使用依賴套件的習慣不好，除造成資料遺失外，也代表沒有即時升級或更新到最新版。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 你可以使用 `php security-checker.phar security:check composer.lock` 指令來掃描 `composer.lock` 的所有套件是否使用已知安全漏洞。
```sh
$ php security-checker.phar security:check composer.lock
```

----

## 畫面截圖
![](https://i.imgur.com/2w1FmGo.png)
> 如果在第一時間就能接獲通報、了解問題並修正解決，儘速更新依賴套件，系統資料安全風險會較低