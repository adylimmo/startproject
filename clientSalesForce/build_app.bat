@echo Pastikan emulator android sudah nyala
@echo off
pause
@echo cleaning gradlew
cd android
call gradlew clean
cd ..
@echo Compiling React native for android
call react-native run-android
@echo on
@echo Jangan lupa buat file 
@echo "http://localhost:8081/index.android.bundle?platform=android" 
@echo dan taruh di 
@echo "android/app/src/main/assets/index.android.bundle"
@echo
@echo Jika sudah siap silahkan lanjut
@echo
@echo off
pause
cd android
@echo Starting Asseble release
call gradlew assembleRelease
cd ..
@echo Setting keytool dan jarsigner
call keytool -genkey -v -keystore my-keystore.keystore -alias notifApps -keyalg RSA -validity 10000
call jarsigner -verbose -keystore my-keystore.keystore android\app\build\outputs\apk\app-release-unsigned.apk notifApps
cd android\app\build\outputs\apk
@echo Build apk bundle
call zipalign -f -v 4 app-release-unsigned.apk apk-build.apk
cd ..\..\..\..\..
@echo 
@echo Success
pause
@echo on