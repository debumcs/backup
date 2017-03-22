::email.bat:::::::::::::::::::::::::::::::::::::::::::::::::::::
@echo off

SendEmail -f "EMT.Admin@quatrro.com" -t "p-fs0121@internal.quatrro.com" -u "Test Subject" -m "Test Message" -q -s 10.100.4.153:25 -xu "EMT.Admin@quatrro.com" -xp Passw0rd
PAUSE
