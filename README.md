## LibreOffice demo app for Sandstorm

This is a **PHP-based Sandstorm app** that uses LibreOffice to convert files to PDF.

## Current status

- The app **works.**

- However, it modifies `unoconv` to hard-code new argv data to pass into LibreOffice.

- Also, you **must** do the conversion twice, seemingly. This is probably because I'm using an old
  version of unoconv that doesn't auto-restart LibreOffice after exit code 81 (which means normal
  restart).

- Therefore it is a very hacky demo app, and you should not assume that the way it does things are
  generally acceptable. It does work, though!

## Context

During August 2016, Michael Nutt attempted to integrate LibreOffice into Sandstorm. Asheesh spent a
while trying to help him in person. After that didn't work, Michael created a self-contained example
repo demonstrating that libreoffice wouldn't launch with unoconv. This repo contains information
about how to make libreoffice launch within Sandstorm by unoconv, even if at the moment it requires
modifying unoconv.

## Further research

- Can we use an environment variable to sidestep the need for the `unoconv` hackery? If so, which
  env var?

- Why did it crash earlier? It seems like libreoffice is allergic to a home var that is fewer than 2
  path levels deep (e.g. /var/home vs. /var) but I'm not really sure.

## Other notes

If you want to learn more about LibreOffice and its path handling, consider doing the following
after starting a grain of this app.

```
$ vagrant-spk enter-grain
rm -rf /var/home/donuts-libreoffice
echo c2V0IGhpc3RvcnkgZmlsZW5hbWUgfi8uZ2RiaGlzdG9yeQpzZXQgaGlzdG9yeSBzYXZlIG9uCiAKaGFuZGxlIFNJR1BXUiBub3N0b3Agbm9wcmludApoYW5kbGUgU0lHWENQVSBub3N0b3Agbm9wcmludApoYW5kbGUgU0lHMzMgbm9zdG9wIG5vcHJpbnQKIAojIHRhYnNldCA0CiAKIyBkZWZpbmUgInB1IiBjb21tYW5kIHRvIGRpc3BsYXkgc2FsX1VuaWNvZGUgKgpkZWZpbmUgcHUKICBzZXQgJHVuaSA9ICRhcmcwCiAgc2V0ICRsZW4gPSAkYXJnMQogIHNldCAkaSA9IDAKICBwcmludGYgIlwiIgogIHdoaWxlICgqJHVuaSAmJiAkaSsrPCRsZW4gJiYgJGk8MjU1KQogICAgaWYgKCokdW5pIDwgMHg4MCkKICAgICAgcHJpbnRmICIlYyIsICooY2hhciopJHVuaSsrCiAgICBlbHNlCiAgICAgIHByaW50ZiAiXFx4JXgiLCAqKHNob3J0KikkdW5pKysKICAgIGVuZAogIGVuZAogIHByaW50ZiAiXCJcbiIKZW5kCiAKIyBkZWZpbmUgInB1cyIgY29tbWFuZCB0byBkaXNwbGF5IHJ0bF91U3RyaW5nCmRlZmluZSBwdXMKICBpZiAoJGFyZzAuYnVmZmVyKQogICAgcHUgJGFyZzAuYnVmZmVyICRhcmcwLmxlbmd0aAogIGVsc2UKICAgIHByaW50ICJJbnZhbGlkL25vbi1pbml0aWFsaXplZCBydGxfdVN0cmluZy4iCiAgZW5kCmVuZAogCiMgZGVmaW5lICJwb3UiIGNvbW1hbmQgdG8gZGlzcGxheSBydGw6Ok9VU3RyaW5nCmRlZmluZSBwb3UKICBpZiAoJGFyZzAucERhdGEpCiAgICBwdXMgJGFyZzAucERhdGEKICBlbHNlCiAgICBwcmludCAiSW52YWxpZC9ub24taW5pdGlhbGl6ZWQgT1VTdHJpbmcuIgogIGVuZAplbmQKIAojIGRlZmluZSAicHR1IiBjb21tYW5kIHRvIGRpc3BsYXkgdG9vbHMgKFVuaSlTdHJpbmcKZGVmaW5lIHB0dQogIGlmICgkYXJnMC5tcERhdGEpCiAgICBwdSAkYXJnMC5tcERhdGEtPm1hU3RyICRhcmcwLm1wRGF0YS0+bW5MZW4KICBlbHNlCiAgICBwcmludCAiSW52YWxpZC9ub24taW5pdGlhbGl6ZWQgdG9vbHMgU3RyaW5nLiIKICBlbmQKZW5kCiAKIyBkZWZpbmUgInBzIiBjb21tYW5kIHRoYXQgd2lsbCBhdXRvZGV0ZWN0IHRoZSB0eXBlIG9mIHRoZSBzdHJpbmcsCiMgYW5kIGNhbGwgYSBmdW5jdGlvbiBhY2NvcmRpbmdseQpkZWZpbmUgcHMKICBpZiAoJGFyZzAucERhdGEpCiAgICBwb3UgJGFyZzAKICBlbHNlCiAgICBpZiAoJGFyZzAubXBEYXRhKQogICAgICBwdHUgJGFyZzAKICAgIGVsc2UKICAgICAgaWYgKCRhcmcwLmJ1ZmZlcikKICAgICAgICBwdXMgJGFyZzAKICAgICAgZWxzZQogICAgICAgIHNldCAkbGVuID0gJGFyZzEKICAgICAgICBpZiAoJGxlbikKICAgICAgICAgIHB1ICRhcmcwICRsZW4KICAgICAgICBlbHNlCiAgICAgICAgICAjIGZpcnN0IDIwICh1bmljb2RlKSBjaGFycwogICAgICAgICAgcHUgJGFyZzAgMjAKICAgICAgICBlbmQKICAgICAgZW5kCiAgICBlbmQKICBlbmQKZW5kCmRvY3VtZW50IHBzCnBzIHNvbWVzdHJpbmcgW2xlbl0KCg==  | base64 --decode > /tmp/gdbinit
TERM=vt100 gdb /usr/lib/libreoffice/program/soffice.bin
source /tmp/gdbinit
set args --headless --invisible --norestore --nodefault --nocrashreport --nofirststartwizard --nologo
catch syscall exit_group
break /home/rene/Debian/Pakete/LibreOffice/libreoffice/libreoffice-4.3.3/desktop/source/deployment/misc/dp_ucb.cxx:102
y
```

Then type `run` and press enter to watch LibreOffice go through its motions.

You will eventually see an exit code. Due to the base64-encoded data above, you
can do:


```
up
ps sMessage
```

which will use a gdb helper called `ps` and print the error message that is the reason for LibreOffice's exiting.

You will also have to `continue` through a few hits to the `dp_ucb.cxx` breakpoint.

If you want to attach at gdb to a _working_ run-through of this code, modify the args line to be:

```
set args --headless --invisible --norestore --nodefault --nocrashreport --nofirststartwizard --nologo -env:UserInstallation=file:///var/home/donuts-libreoffice
```

If you want to see the source code that is being executed, use:

[http://sources.debian.net/src/libreoffice/1:4.3.3-2%2Bdeb8u4/desktop/source/deployment/misc/dp_ucb.cxx/](http://sources.debian.net/src/libreoffice/1:4.3.3-2%2Bdeb8u4/desktop/source/deployment/misc/dp_ucb.cxx/)

## Thanks

Michael Stahl of RedHat helped Asheesh Laroia greatly today (Friday August 26, 2016); without that
help, I imagine I would still be stuck.
